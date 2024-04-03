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
                <div>Semi - Expendable Ledger Card | Form</div>
            </h1>
            <hr>

            <div>
                <a href="{{ url ('/all-semi-expandable')}}"> <button class="btn btn-primary btn-sm no-print"> <small>
                            <<</small>back</button></a>
            </div>
            <!-- /# row -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-title pr" style="text-align: center;">
                            <h4><strong>SEMI - EXPENDABLE LEDGER CARD</strong></h4>
                        </div>
                        <br>
               
                        <form action="{{ route('add-stock-card') }}" method="POST">
                            @csrf
                         
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">
                                            Entity Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" name="entity_name" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;width: 300px" placeholder="">
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
                                            <input type="text" name="fund_cluster" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;width: 300px" placeholder="">
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
                                                    <th scope="row">Semi-expendable Property:</th>
                                                    <td>
                                                        <input type="text" name="item_name" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('item_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <th scope="row">Semi-expendable Property Number:</th>
                                                    <td>
                                                        <input type="text" name="stock_no" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('stock_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Description:</th>
                                                    <td>
                                                        <input type="text" name="description" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('description')
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
                                                    <th scope="col" colspan="3" style="text-align: center;">Issue/Transfer/Disposal</th>
                                                    <th scope="col" colspan="1" style="text-align: center;">Balance</th>
                                                    <th scope="col" colspan="2"></th>

                                                </tr>
                                                <tr style="font-size:12px;">
                                                    <th scope="col" style="text-align: center;">Date</th>
                                                    <th scope="col" style="text-align: center;">Reference
                                                    </th>
                                                    <th scope="col" style="text-align: center;">Qty</th>
                                                    <th scope="col" style="text-align: center;">Unit Cost
                                                    </th>
                                                    <th scope="col" style="text-align: center;">Total Cost
                                                    <th scope="col" style="text-align: center;">Item Number</th>
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
                                                        <input type="date" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('reference')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="receipt_qty" id="receipt_qtyy" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('receipt_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="receipt_unitcost" id="receipt_unitcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('receipt_unitcost')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="receipt_totalcost" id="receipt_totalcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                        @error('receipt_totalcost')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="issue_qty" id="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('issue_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="issue_unitcost" id="issue_unitcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                        @error('issue_unitcost')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="issue_totalcost" id="issue_totalcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                        @error('issue_totalcost')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                    </td>

                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-body d-flex justify-content-center">
                                    <!-- Added flexbox classes to center the button -->
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

        // Function to calculate issue total cost
        function calculateIssueTotalCost() {
            var issueQty = parseFloat(document.getElementById("issue_qty").value);
            var issueUnitCost = parseFloat(document.getElementById("issue_unitcost").value);
            var issueTotalCost = issueQty * issueUnitCost;
            document.getElementById("issue_totalcost").value = issueTotalCost.toFixed(
                2); // Adjust to your required precision
        }

        // Attach event listeners to input fields for receipt and issue to trigger calculation
        document.getElementById("receipt_qtyy").addEventListener("input", calculateReceiptTotalCost);
        document.getElementById("receipt_unitcost").addEventListener("input", calculateReceiptTotalCost);
        document.getElementById("issue_qty").addEventListener("input", calculateIssueTotalCost);
        document.getElementById("issue_unitcost").addEventListener("input", calculateIssueTotalCost);

        // Calculate on initial load if values are present
        calculateReceiptTotalCost();
        calculateIssueTotalCost();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Example of using SweetAlert with a rectangle style and blue color
        @if(session('success'))
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

        @if(session('failed'))
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

</body>

</html>