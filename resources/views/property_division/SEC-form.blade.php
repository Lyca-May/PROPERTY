<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES</title>
    <!-- ================= Favicon ================== -->
    <style>
        .text-line {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0;
            background-color: transparent;
        }
    </style>
</head>

<body>

    @include('navbar')
    @include('sidebar')


    <div class="main-content">
        <section class="section">
            <h1 class="section-header">
                <div>Semi-Expendable Property Card | Form</div>
            </h1>
            <hr>

            <div>
                <a href="{{ url('/all-semi-expandable') }}"> <button class="btn btn-primary btn-sm no-print"> <small>
                            </small>back</button></a>
            </div>
            <!-- /# row -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-title pr" style="text-align: center;">
                            <h4><strong>SEMI - EXPENDABLE PROPERTY CARD</strong></h4>
                        </div>
                        <br>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('add-sep-card') }}" method="POST">
                            @csrf

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">
                                                Entity Name
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" name="entity_name" class="form-control text-line"
                                                    style="padding-top: 4px; padding-bottom: 4px;width: 300px"
                                                    placeholder="">
                                                @error('entity_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">
                                                Fund Cluster
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" name="fund_cluster" class="form-control text-line"
                                                    style="padding-top: 4px; padding-bottom: 4px;width: 300px"
                                                    placeholder="" value="01101101" placeholder="01101101">
                                                @error('fund_cluster')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="width: 150px">Semi-Expendable Property:</th>
                                                    <td>
                                                        <input type="text" id="unitInput" name="sep_name" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px; width:100%" placeholder="Type to search">

                                                        <div id="unitList"></div>

                                                        @error('sep_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <th scope="row" style="width:150px">Semi-Expendable Property Number:</th>
                                                    <td>
                                                        <input type="text" name="sep_no" id="sep_no"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('sep_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Description:</th>
                                                    <td>
                                                        <input type="text" name="desc"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('desc')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" colspan="2"></th>
                                                    <th scope="col" colspan="3" style="text-align: center;">
                                                        Receipt</th>
                                                    <th scope="col" colspan="3" style="text-align: center;">
                                                        Issue/Transfer/Disposal</th>
                                                    <th scope="col" colspan="1" style="text-align: center;">
                                                        Balance</th>
                                                    <th scope="col" colspan="2"></th>

                                                </tr>
                                                <tr style="font-size:12px;">
                                                    <th scope="col" style="text-align: center;">Date</th>
                                                    <th scope="col" style="text-align: center; width: 200px">Reference
                                                    </th>
                                                    <th scope="col" style="text-align: center;">Qty</th>
                                                    <th scope="col" style="text-align: center; width: 200px">Unit Cost
                                                    </th>
                                                    <th scope="col" style="text-align: center; width: 200px">Total Cost
                                                    <th scope="col" style="text-align: center; width: 300px">Item Number</th>
                                                    <th scope="col" style="text-align: center;">Qty</th>
                                                    <th scope="col" style="text-align: center;">Office Officer
                                                    </th>
                                                    <th scope="col" style="text-align: center;">Qty
                                                    </th>
                                                    <th scope="col" style="text-align: center;">Amount</th>
                                                    <th scope="col" style="text-align: center;">Remarks</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="date" name="date"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="ref"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('ref')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="receipt_qty" id="receipt_qtyy"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px; width:100px"
                                                            placeholder="">
                                                        @error('receipt_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="receipt_unitcost"
                                                            id="receipt_unitcost" class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('receipt_unitcost')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="receipt_totalcost"
                                                            id="receipt_totalcost" class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="" readonly>
                                                        @error('receipt_totalcost')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_no" id="item_no"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('item_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="issue_qty" id="issue_qty"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="" hidden>
                                                        @error('issue_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="office_officer"
                                                            id="office_officer" class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="" hidden>
                                                        @error('office_officer')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name=""
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="" hidden>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="amount"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="" hidden>
                                                        @error('amount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="remarks"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="" hidden>
                                                        @error('remarks')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-body d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('footer')



    <script>
        // Function to calculate receipt total cost
        function calculateReceiptTotalCost() {
            var receiptQty = parseFloat(document.getElementById("receipt_qtyy").value);
            var receiptUnitCost = parseFloat(document.getElementById("receipt_unitcost").value);
            var receiptTotalCost = receiptQty * receiptUnitCost;
            document.getElementById("receipt_totalcost").value = receiptTotalCost.toFixed(
                2); // Adjust to your required precision
        }

        // Attach event listeners to input fields for receipt and issue to trigger calculation
        document.getElementById("receipt_qtyy").addEventListener("input", calculateReceiptTotalCost);
        document.getElementById("receipt_unitcost").addEventListener("input", calculateReceiptTotalCost);


        // Calculate on initial load if values are present
        calculateReceiptTotalCost();
        calculateIssueTotalCost();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Example of using SweetAlert with a rectangle style and blue color
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('
                            success ') }}',
                customClass: {
                    container: 'custom-alert-container',
                    popup: 'custom-alert-popup',
                    title: 'custom-alert-title',
                    confirmButton: 'custom-alert-button'
                }
            });
        @endif

        @if (session('failed'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('
                            failed ') }}',
                customClass: {
                    container: 'custom-alert-container',
                    popup: 'custom-alert-popup',
                    title: 'custom-alert-title',
                    confirmButton: 'custom-alert-button'
                }
            });
        @endif
    </script>
    <script>
        $(document).ready(function() {
            // Attach an event listener to the sep_no input field
            $('#sep_no').on('input', function() {
                // Get the value of the sep_no input field
                var sepNoValue = $(this).val();

                // Set the value of the item_no input field to the value of sep_no
                $('#item_no').val(sepNoValue);
            });
        });
    </script>

<script>
    const inventoryUnits = [
        { name: "OFFICE EQUIPMENT", number: 10405020 },
        { name: "FURNITURE AND FIXTURE", number: 10406010 },
        { name: "OTHER SUPPLIES/MATERIALS (CONSUMPTION)", number: 10404990 },
        { name: "AGRICULTURAL/MARINE FOR DISTRIBUTION", number: 10406010 },
        { name: "MILITARY, POLICE & SECURITY, EQUIPMENT", number: 10405090 },
        { name: "COMMUNICATION EQUIPMENT", number: 10405070 },
        { name: "OTHER SUPPLIES INVENTORY", number: 10404010 },
        { name: "MARINE & FISHERY EQUIPMENT", number: 10405050 },
        { name: "TECHNOLOGY AND SCIENTIFIC EQUIPMENT", number: 10405130 },
        { name: "OTHER PROPERTY PLANT &  EQUIPMENT", number: 10405190 },
        { name: "INFORMATION AND COMMUNICATION TECHNOLOGY EQUIPMENT", number: 10405030 },
    ];

    const unitInput = document.getElementById("unitInput");
    const unitList = document.getElementById("unitList");
    const sepNoInput = document.getElementById("sep_no"); // Get the input field
    const itemNo = document.getElementById("item_no"); // Get the input field

    unitInput.addEventListener("input", function() {
        const inputValue = unitInput.value.trim().toLowerCase();
        const matchedUnits = inventoryUnits.filter(unit => unit.name.toLowerCase().includes(inputValue));

        displayMatchedUnits(matchedUnits);
    });

    function displayMatchedUnits(matchedUnits) {
        unitList.innerHTML = ""; // Clear previous content

        matchedUnits.forEach(unit => {
            const unitItem = document.createElement("div");
            unitItem.textContent = unit.name;
            unitItem.classList.add("unitItem"); // Add class for styling
            unitItem.addEventListener("click", function() {
                unitInput.value = unit.name; // Set input value to selected unit name
                sepNoInput.value = unit.number; // Set sep_no input value to corresponding number
                itemNo.value = unit.number; // Set sep_no input value to corresponding number
                unitList.innerHTML = ""; // Clear list after selection
            });
            unitList.appendChild(unitItem);
        });
    }

    // Close the dropdown when clicking outside of it
    document.addEventListener("click", function(event) {
        if (!event.target.matches(".unitItem") && !event.target.matches("#unitInput")) {
            unitList.innerHTML = "";
        }
    });
</script>


</body>

</html>
