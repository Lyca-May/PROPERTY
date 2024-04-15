
var csrfToken = "{{ csrf_token() }}";
$(document).ready(function() {
    function calculateBalance() {
        var receiptQty = parseFloat($(this).closest('tr').find('input[name="receipt_qty"]').val()) || 0;
        var issueQty = parseFloat($(this).closest('tr').find('input[name="issue_qty"]').val()) || 0;
        var unitCost = parseFloat($(this).closest('tr').find('input[name="receipt_unitcost"]').val()) || 0;

        var balanceQty = receiptQty - issueQty;
        var balanceAmount = unitCost * balanceQty;

        $(this).closest('tr').find('input[name="bal_qty"]').val(balanceQty.toFixed(2));
        $(this).closest('tr').find('input[name="bal_amount"]').val(balanceAmount.toFixed(2));
    }

    $(document).on('input', 'input[name="receipt_qty"], input[name="issue_qty"]', calculateBalance);

    $('[data-toggle="tooltip"]').tooltip();

    $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");
        var propId = $(this).data("prop-id");
        var editId = $(this).data("edit-id");
        var actions =
            '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
            '<a class="edit" title="Edit" data-edit-id="' + editId +
            '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
            '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

        var row = '<tr>' +
            '<td><input type="date" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><textarea type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea></td>' +
            '<td><input type="text" name="receipt_qty" value="{{ $prop_cards->receipt_qty }}" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><input type="text" name="receipt_unitcost" value="{{ $prop_cards->receipt_unitcost }}" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><input type="text" name="receipt_totalcost" value="{{ $prop_cards->receipt_totalcost }}" class="form-control text-line receipt-total" style="padding-top: 4px; padding-bottom: 4px;" ></td>' +
            '<td><input type="text" name="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><input type="text" name="office_officer" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td>' +
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="ISSUE">' +
            '</td>' +
            '<td>' +
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="TRANSFER">' +
            '</td>' +
            '<td>' +
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="DISPOSAL">' +
            '</td>' +
            '</div>' +
            '<td><input type="text" name="bal_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;"></td>' +
            '<td><input type="text" name="bal_amount" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><textarea type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea></td>' +
            '<td>' + actions + '</td>' +
            '<td><input type="text" name="prop_id" value="' + propId +
            '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '</tr>';

        $("table tbody").append(row);

        $("table tbody tr:last-child").find(".add").show();
        $("table tbody tr:last-child").find(".edit").hide();
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).on("click", ".add", function() {
        var rowData = {};
        var input = $(this).parents("tr").find(
            'input[type="text"], input[type="date"], textarea, input[type="checkbox"]');
        input.each(function() {
            var name = $(this).attr("name");
            var value = $(this).val();
            if ($(this).attr('type') === 'checkbox') {
                if ($(this).is(':checked')) {
                    value = 'ISSUE';
                } else if ($(this).prop('checked')) {
                    value = 'TRANSFER';
                } else {
                    value = 'DISPOSAL';
                }
            }

            rowData[name] = value;
        });

        $.ajax({
            type: 'POST',
            url: '/add-prop-extension',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: rowData,
            success: function(response) {
                // Update table with new row data
                var newRow = '<tr>';
                Object.values(rowData).forEach(function(value) {
                    newRow += '<td>' + value + '</td>';
                });
                newRow += '<td>' + actions + '</td></tr>';
                $("table tbody").append(newRow);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });

        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").removeAttr("disabled", "disabled");
    });

    $(document).on("click", ".edit", function() {
        var row = $(this).closest("tr");
        var editId = $(this).data("edit-id");

        if (editId) {
            $.ajax({
                type: 'GET',
                url: '/get-prop-ext-data/' + editId,
                success: function(response) {
                    var rowData = response;
                    row.find('td:not(:last-child)').each(function() {
                        var fieldName = $(this).data("field-name");
                        if (fieldName) {
                            var value = rowData[fieldName];
                            if (fieldName === "issue_transfer_disposal") {
                                // Handle checkboxes
                                $(this).html('<input type="checkbox" name="' +
                                    fieldName + '" ' + (value ? 'checked' :
                                        '') + '>');
                            } else {
                                // Handle other input fields
                                $(this).html(
                                    '<input type="text" class="form-control" name="' +
                                    fieldName + '" value="' + value + '">');
                            }
                        }
                    });

                    // Show the save button and hide the edit button
                    row.find('.add').show();
                    row.find('.edit').hide();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        } else {
            console.error("editId is undefined");
        }
    });

    $(document).on("click", ".add", function() {
        var row = $(this).closest("tr");
        var propId = $(this).data("prop-id");
        var editId = $(this).data("edit-id");
        var rowData = {
            prop_id: propId
        };

        // Collect the updated data from the row
        row.find('input[type="text"], input[type="checkbox"]').each(function() {
            var fieldName = $(this).attr("name");
            var value = $(this).is(":checkbox") ? $(this).is(":checked") : $(this).val();
            rowData[fieldName] = value;
        });

        // Set the ID value if available
        if (editId) {
            rowData.id = editId;
        }

        // Perform an AJAX request to update the data on the server
        $.ajax({
            type: 'POST',
            url: '/update-prop-ext-data/' + editId, // Use editId in the URL
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: rowData,
            success: function(response) {
                // Optionally, handle success response
                console.log("Data updated successfully!");
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
        row.find('.edit').show();
        row.find('.add').hide();
    });
    $(document).on("click", ".delete", function() {
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });

});
