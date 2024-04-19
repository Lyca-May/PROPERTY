const receiptInputs = document.querySelectorAll(".receipt-input");
receiptInputs.forEach((input) => {
    input.addEventListener("input", updateReceiptTotalCost);
});

function updateReceiptTotalCost(event) {
    const parentRow = event.target.closest("tr");
    const qty = parseFloat(
        parentRow.querySelector('[name="receipt_qty"]').value
    );
    const unitCost = parseFloat(
        parentRow.querySelector('[name="receipt_unitcost"]').value
    );
    const totalCost = qty * unitCost;
    parentRow.querySelector('[name="receipt_totalcost"]').value = isNaN(
        totalCost
    )
        ? ""
        : totalCost.toFixed(2);
}

$(document).ready(function () {
    $("#search-input").on("keyup", function () {
        var searchText = $(this).val().toLowerCase();
        $(".card-row .card2").each(function () {
            var entityName = $(this)
                .find(".card-title:first")
                .text()
                .toLowerCase();
            var fundCluster = $(this)
                .find(".card-title:nth-child(2)")
                .text()
                .toLowerCase();
            var itemName = $(this).find(".card-text").text().toLowerCase();
            if (
                entityName.indexOf(searchText) === -1 &&
                fundCluster.indexOf(searchText) === -1 &&
                itemName.indexOf(searchText) === -1
            ) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const tables = document.querySelectorAll(".table-resizable");

    tables.forEach((table) => {
        let ths = table.querySelectorAll("th");
        let startX, startWidth;

        ths.forEach((th) => {
            th.addEventListener("mousedown", function (event) {
                startX = event.pageX;
                startWidth = th.offsetWidth;

                document.addEventListener("mousemove", onMouseMove);
                document.addEventListener("mouseup", () => {
                    document.removeEventListener("mousemove", onMouseMove);
                });
            });

            function onMouseMove(event) {
                const diffX = event.pageX - startX;
                th.style.width = startWidth + diffX + "px";
            }
        });
    });
});

var csrfToken = "{{ csrf_token() }}";
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $(".add-new").click(function () {
        $(this).attr("disabled", "disabled");
        var propId = $(this).data("prop-id");
        var editId = $(this).data("edit-id");
        var actions =
            '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
            '<a class="edit" title="Edit" data-edit-id="' +
            editId +
            '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
            '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

        var row =
            "<tr>" +
            '<td><input type="date" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><textarea type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea></td>' +
            '<td><input type="hidden" name="receipt_qty" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><input type="hidden" name="receipt_unitcost" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><input type="hidden" name="receipt_totalcost" value="0" class="form-control text-line receipt-total" style="padding-top: 4px; padding-bottom: 4px;" ></td>' +
            '<td><input type="text" name="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><select name="transfer_dropdown" id="transfer_dropdown" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;"></select></td>' +
            '<td><input type="text" name="office_officer" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            "<td>" +
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="ISSUE">' +
            "</td>" +
            "<td>" +
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="TRANSFER">' +
            "</td>" +
            "<td>" +
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="DISPOSAL">' +
            "</td>" +
            "</div>" +
            '<td><input type="text" name="new_bal_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;"></td>' +
            '<td><input type="text" name="bal_amount" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            '<td><textarea type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea></td>' +
            "<td>" +
            actions +
            "</td>" +
            '<td><input type="text" name="prop_id" value="' +
            propId +
            '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
            "</tr>";
        $("table tbody").append(row);

        var rowCount = $("table tbody tr").length;

        if (rowCount === 2) {
            console.log("More than 1 row added.");
            calculateBalance();
        } else if (rowCount > 3) {
            console.log("1 row added.");
            $(document).on(
                "input",
                'table tbody tr:last input[name="issue_qty"]',
                function () {
                    // Get the parent row
                    var $row = $(this).closest("tr");

                    // Get the index of the current row
                    var index = $row.index();

                    // Check if the current row is not the first or last row
                    if (index > 1 && index < $("table tbody tr").length) {
                        // Get the input field for new_bal_qty in the second to the last row
                        var prevRowBalQtyInput = $row
                            .prev()
                            .prev()
                            .find('input[name="new_bal_qty"]');
                        var prevRowBalQtyValue = prevRowBalQtyInput.val();
                        var prevRowBalQty = parseFloat(prevRowBalQtyValue);
                        console.log("Previous Row Bal Qty:", prevRowBalQty);
                        var unitCost =
                            parseFloat(
                                $(this)
                                    .closest(".modal-body")
                                    .find('input[name="receipt_unitcost"]')
                                    .val()
                            ) || 0;
                        console.log("Unitcost:", unitCost);
                        // Get the last row's issue_qty
                        var $lastRow = $("table tbody tr:last");
                        var issueQty = parseFloat(
                            $lastRow.find('input[name="issue_qty"]').val()
                        );
                        console.log("Issue Qty:", issueQty);
                        var newBalQty = prevRowBalQty - issueQty;

                        var newBalAm = unitCost * newBalQty;
                        console.log("New Bal Qty:", newBalQty);
                        $row.find('input[name="new_bal_qty"]').val(newBalQty);
                        $row.find('input[name="bal_amount"]').val(newBalAm);
                    } else {
                        console.log("NO VALUE FOR THE PREVIOUS BAL QTY");
                    }
                }
            );
        }
        $("table tbody tr:last-child").find(".add").show();
        $("table tbody tr:last-child").find(".edit").hide();
        $('[data-toggle="tooltip"]').tooltip();
    });

    function calculateBalance() {
        var receiptQty =
            parseFloat(
                $(this)
                    .closest(".modal-body")
                    .find('input[name="receipt_qty"]')
                    .val()
            ) || 0;
        var unitCost =
            parseFloat(
                $(this)
                    .closest(".modal-body")
                    .find('input[name="receipt_unitcost"]')
                    .val()
            ) || 0;
        var issueQty =
            parseFloat(
                $(this).closest("tr").find('input[name="issue_qty"]').val()
            ) || 0;

        var balanceQty = receiptQty - issueQty;
        var balanceAmount = unitCost * balanceQty;

        $(this).closest("tr").find('input[name="bal_qty"]').val(balanceQty);
        $(this)
            .closest("tr")
            .find('input[name="bal_amount"]')
            .val(balanceAmount.toFixed(2));
    }
    $(document).on(
        "input",
        '.modal-body input[name="receipt_qty"], .modal-body input[name="issue_qty"]',
        calculateBalance
    );

    $(document).on("click", ".add", function () {
        var rowData = {};
        var input = $(this)
            .parents("tr")
            .find(
                'input[type="text"], input[type="date"], textarea, input[type="checkbox"]'
            );
        input.each(function () {
            var name = $(this).attr("name");
            var value = $(this).val();
            if ($(this).attr("type") === "checkbox") {
                if ($(this).is(":checked")) {
                    value = "ISSUE";
                } else if ($(this).prop("checked")) {
                    value = "TRANSFER";
                } else {
                    value = "DISPOSAL";
                }
            }

            rowData[name] = value;
        });

        $.ajax({
            type: "POST",
            url: "/add-prop-extension",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: rowData,
            success: function (response) {
                // Update table with new row data
                var newRow = "<tr>";
                Object.values(rowData).forEach(function (value) {
                    newRow += "<td>" + value + "</td>";
                });
                newRow += "<td>" + actions + "</td></tr>";
                $("table tbody").append(newRow);
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });

        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").removeAttr("disabled", "disabled");
    });

    $(document).on("click", ".edit", function () {
        var row = $(this).closest("tr");
        var editId = $(this).data("edit-id");

        if (editId) {
            $.ajax({
                type: "GET",
                url: "/get-prop-ext-data/" + editId,
                success: function (response) {
                    var rowData = response;
                    row.find("td:not(:last-child)").each(function () {
                        var fieldName = $(this).data("field-name");
                        if (fieldName) {
                            var value = rowData[fieldName];
                            if (fieldName === "issue_transfer_disposal") {
                                // Handle checkboxes
                                $(this).html(
                                    '<input type="checkbox" name="' +
                                        fieldName +
                                        '" ' +
                                        (value ? "checked" : "") +
                                        ">"
                                );
                            } else {
                                // Handle other input fields
                                $(this).html(
                                    '<input type="text" class="form-control" name="' +
                                        fieldName +
                                        '" value="' +
                                        value +
                                        '">'
                                );
                            }
                        }
                    });

                    // Show the save button and hide the edit button
                    row.find(".add").show();
                    row.find(".edit").hide();
                },
                error: function (xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                },
            });
        } else {
            console.error("editId is undefined");
        }
    });

    $(document).on("click", ".add", function () {
        var row = $(this).closest("tr");
        var propId = $(this).data("prop-id");
        var editId = $(this).data("edit-id");
        var rowData = {
            prop_id: propId,
        };

        // Collect the updated data from the row
        row.find('input[type="text"], input[type="checkbox"]').each(
            function () {
                var fieldName = $(this).attr("name");
                var value = $(this).is(":checkbox")
                    ? $(this).is(":checked")
                    : $(this).val();
                rowData[fieldName] = value;
            }
        );

        // Set the ID value if available
        if (editId) {
            rowData.id = editId;
        }

        // Perform an AJAX request to update the data on the server
        $.ajax({
            type: "POST",
            url: "/update-prop-ext-data/" + editId, // Use editId in the URL
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: rowData,
            success: function (response) {
                // Optionally, handle success response
                console.log("Data updated successfully!");
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
        row.find(".edit").show();
        row.find(".add").hide();
    });
    $(document).on("click", ".delete", function () {
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });


});


//
$(".add-new").click(function() {
    event.preventDefault(); // Prevent default behavior of button (e.g., form submission)
    $(this).attr("disabled", "disabled");
    var propId = $(this).data("prop-id");
    var editId = $(this).data("edit-id");
    var actions =
        '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
        '<a class="edit" title="Edit" data-edit-id="' +
        editId +
        '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
        var filteredOfficers = {!! json_encode($filteredOfficers) !!};
    console.log(filteredOfficers);
    var row =
        $("<tr>").append(
            $('<td>').append(
                '<input type="date" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
            ),
            $('<td>').append(
                '<textarea type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea>'
            ),
            $('<td>').append(
                '<input type="hidden" name="receipt_qty" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
            ),
            $('<td>').append(
                '<input type="hidden" name="receipt_unitcost" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
            ),
            $('<td>').append(
                '<input type="hidden" name="receipt_totalcost" value="0" class="form-control text-line receipt-total" style="padding-top: 4px; padding-bottom: 4px;" >'
            ),
            $('<td>').append(
                '<input type="text" name="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
            ),
            $('<td>').append(
                $('<select>').attr({
                    'name': 'transfer_dropdown',
                    'id': 'transfer_dropdown',
                    'class': 'form-control text-line',
                    'style': 'padding-top: 4px; padding-bottom: 4px;'
                }).append(
                    // Append options dynamically from filteredOfficers array
                    filteredOfficers.map(function(officer) {
                        return $('<option>').attr('value', officer).text(officer);
                    })
                )
            ),
            $('<td>').append(
                '<input type="text" name="office_officer" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
            ),
            $('<td>').append(
                '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="ISSUE">'
            ),
            $('<td>').append(
                '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="TRANSFER">'
            ),
            $('<td>').append(
                '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="DISPOSAL">'
            ),
            $('<td>').append(
                '<input type="text" name="new_bal_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;">'
            ),
            $('<td>').append(
                '<input type="text" name="bal_amount" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
            ),
            $('<td>').append(
                '<textarea type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea>'
            ),
            $('<td>').append(actions),
            $('<td>').append('<input type="text" name="prop_id" value="' + propId +
                '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
            )
        );
    $("table tbody").append(row);
    console.log("Row appended");

    var rowCount = $("table tbody tr").length;

    if (rowCount === 2) {
        console.log("row 2 row added.");
        calculateBalance();
    } else if (rowCount > 3) {
        console.log("more than 2 row added.");

        $(document).on(
            "input",
            'table tbody tr:last input[name="issue_qty"]',
            function() {
                // Get the parent row
                var $row = $(this).closest("tr");

                // Get the index of the current row
                var index = $row.index();

                // Check if the current row is not the first or last row
                if (index > 1 && index < $("table tbody tr").length) {
                    // Get the input field for new_bal_qty in the second to the last row
                    var prevRowBalQtyInput = $row
                        .prev()
                        .prev()
                        .find('input[name="new_bal_qty"]');
                    var prevRowBalQtyValue = prevRowBalQtyInput.val();
                    var prevRowBalQty = parseFloat(prevRowBalQtyValue);
                    console.log("Previous Row Bal Qty:", prevRowBalQty);
                    var unitCost =
                        parseFloat(
                            $(this)
                            .closest(".modal-body")
                            .find('input[name="receipt_unitcost"]')
                            .val()
                        ) || 0;
                    console.log("Unitcost:", unitCost);
                    // Get the last row's issue_qty
                    var $lastRow = $("table tbody tr:last");
                    var issueQty = parseFloat(
                        $lastRow.find('input[name="issue_qty"]').val()
                    );
                    console.log("Issue Qty:", issueQty);
                    var newBalQty = prevRowBalQty - issueQty;

                    var newBalAm = unitCost * newBalQty;
                    console.log("New Bal Qty:", newBalQty);
                    $row.find('input[name="new_bal_qty"]').val(newBalQty);
                    $row.find('input[name="bal_amount"]').val(newBalAm);
                } else {
                    console.log("NO VALUE FOR THE PREVIOUS BAL QTY");
                }
            }
        );
    }
    $("table tbody tr:last-child").find(".add").show();
    $("table tbody tr:last-child").find(".edit").hide();
    $('[data-toggle="tooltip"]').tooltip();
});



$(".add-new").click(function(event) {
    event
        .preventDefault(); // Prevent default behavior of button (e.g., form submission)
    $(this).attr("disabled", "disabled");
    var propId = $(this).data("prop-id");
    var editId = $(this).data("edit-id");
    var actions =
        '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
        '<a class="edit" title="Edit" data-edit-id="' +
        editId +
        '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
    var filteredOfficers = {!! json_encode($filteredOfficers) !!};
    console.log(filteredOfficers);
    var row = $("<tr>").append(
        $('<td>').append(
            '<input type="date" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
        ),
        $('<td>').append(
            '<textarea type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea>'
        ),
        $('<td>').append(
            '<input type="hidden" name="receipt_qty" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
        ),
        $('<td>').append(
            '<input type="hidden" name="receipt_unitcost" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
        ),
        $('<td>').append(
            '<input type="hidden" name="receipt_totalcost" value="0" class="form-control text-line receipt-total" style="padding-top: 4px; padding-bottom: 4px;" >'
        ),
        $('<td>').append(
            '<input type="text" name="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
        ),
        $('<td>').append(
            $('<select>').attr({
                'name': 'transfer_dropdown',
                'id': 'transfer_dropdown',
                'class': 'form-control text-line',
                'style': 'padding-top: 4px; padding-bottom: 4px;'
            }).append(
                // Append options dynamically from filteredOfficers array
                filteredOfficers.map(function(officer) {
                    return $('<option>').attr('value', officer).text(
                        officer);
                })
            )
        ),
        $('<td>').append(
            '<input type="text" name="office_officer" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
        ),
        // Checkboxes for Issue, Transfer, and Disposal
        $('<td>').append(
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal1" value="ISSUE">'
        ),
        $('<td>').append(
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal2" value="TRANSFER">'
        ),
        $('<td>').append(
            '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal3" value="DISPOSAL">'
        ),
        $('<td>').append(
            '<input type="text" name="new_bal_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;">'
        ),
        $('<td>').append(
            '<input type="text" name="bal_amount" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
        ),
        $('<td>').append(
            '<textarea type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea>'
        ),
        $('<td>').append(actions),
        $('<td>').append('<input type="text" name="prop_id" value="' + propId +
            '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
        )
    );
    row.find('#issue_transfer_disposal1').click(function() {
        var associatedInput = $(this).closest("tr").find(
            'input[name="issue_transfer_disposal"]');
        if ($(this).is(":checked")) {
            associatedInput.val("ISSUE");
        } else {
            associatedInput.val("");
        }
    });

    $("table tbody").append(row);
    var rowCount = $("table tbody tr").length;
    console.log("rowCount:", rowCount);

    if (rowCount  === 2) {
        console.log("row 2 added.");
        calculateBalance();
    } else if (rowCount > 2) {
        console.log("more than 2 row added.");

        $(document).on(
            "input",
            'table tbody tr:last input[name="issue_qty"]',
            function() {
                // Get the parent row
                var $row = $(this).closest("tr");

                // Get the index of the current row
                var index = $row.index();

                // Check if the current row is not the first or last row
                if (index > 1 && index < $("table tbody tr").length) {
                    // Get the input field for new_bal_qty in the second to the last row
                    var prevRowBalQtyInput = $row
                        .prev()
                        .prev()
                        .find('input[name="new_bal_qty"]');
                    var prevRowBalQtyValue = prevRowBalQtyInput.val();
                    var prevRowBalQty = parseFloat(prevRowBalQtyValue);
                    console.log("Previous Row Bal Qty:", prevRowBalQty);
                    var unitCost =
                        parseFloat(
                            $(this)
                            .closest(".modal-body")
                            .find('input[name="receipt_unitcost"]')
                            .val()
                        ) || 0;
                    console.log("Unitcost:", unitCost);
                    // Get the last row's issue_qty
                    var $lastRow = $("table tbody tr:last");
                    var issueQty = parseFloat(
                        $lastRow.find('input[name="issue_qty"]').val()
                    );
                    console.log("Issue Qty:", issueQty);
                    var newBalQty = prevRowBalQty - issueQty;

                    var newBalAm = unitCost * newBalQty;
                    console.log("New Bal Qty:", newBalQty);
                    $row.find('input[name="new_bal_qty"]').val(newBalQty);
                    $row.find('input[name="bal_amount"]').val(newBalAm);
                } else {
                    console.log("NO VALUE FOR THE PREVIOUS BAL QTY");
                }
            }
        );
    }
    $("table tbody tr:last-child").find(".add").show();
    $("table tbody tr:last-child").find(".edit").hide();
    $('[data-toggle="tooltip"]').tooltip();
});
