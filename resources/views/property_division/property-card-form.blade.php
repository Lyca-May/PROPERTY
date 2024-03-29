<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ asset('assets/images/property.jpg') }}">

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
                <div>Property Card | Form</div>
            </h1>

            <hr>
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-title pr" style="text-align: center;">
                            <h4><strong>PROPERTY CARD</strong></h4>
                        </div>
                        <form action="{{ route('add-property-card') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label">
                                            Entity Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" name="entity_name" class="form-control text-line"
                                                style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                            @error('entity_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label">
                                            Fund Cluster
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" name="fund_cluster" class="form-control text-line"
                                                style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                            @error('fund_cluster')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
                                                    <th scope="row">Property,Plant & Equipment:</th>
                                                    <td>
                                                        <input type="text" name="prop_plant_eq"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('prop_plant_eq')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <th scope="row">Property No:</th>
                                                    <td>
                                                        <input type="text" name="prop_no"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('prop_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Description:</th>
                                                    <td>
                                                        <input type="text" name="description"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
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
                                                        RECEIPT</th>
                                                    <th scope="col" colspan="2" style="text-align: center;">
                                                        ISSUE/TRANSFER/DISPOSAL
                                                    </th>
                                                    <th scope="col" colspan="1" style="text-align: center;">
                                                        BALANCE</th>
                                                    <th scope="col" colspan="2" style="text-align: center;"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="col" style="text-align: center;">DATE</th>
                                                    <th scope="col" style="text-align: center;">REFERENCE
                                                    </th>
                                                    <th scope="col" style="text-align: center;">QTY</th>
                                                    <th scope="col" style="text-align: center;">UNIT COST
                                                    </th>
                                                    <th scope="col" style="text-align: center;">TOTAL
                                                        COST</th>
                                                    <th scope="col" style="text-align: center;">QTY</th>
                                                    <th scope="col" style="text-align: center;">OFFICE
                                                        OFFICER</th>
                                                    <th scope="col" style="text-align: center;">QTY</th>
                                                    <th scope="col" style="text-align: center;">AMOUNT
                                                    </th>
                                                    <th scope="col" style="text-align: center;">REMARKS
                                                    </th>
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
                                                        <textarea type="text" name="reference" class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;" placeholder="@error('reference') {{ $message }} @enderror"></textarea>
                                                        @error('reference')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="receipt_qty" id="receipt_qtyy"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
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
                                                        <input type="text" name="issue_qty" id="issue_qty"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('issue_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="issue_office_officer"
                                                            id="issue_office_officer" class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('issue_office_officer')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="bal_qty" id=""
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="" readonly>
                                                        @error('bal_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" name="repair_amount"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
                                                        @error('repair_amount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>

                                                    <td>
                                                        <input type="text" name="remarks"
                                                            class="form-control text-line"
                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                            placeholder="">
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
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#8cc63f',
                iconColor: '#ffffff',
                customClass: {
                    title: 'text-white',
                    content: 'text-white'
                }
            });
        </script>
    @endif

    @if (session('failed'))
        <script>
            Swal.fire({
                icon: 'failed',
                title: 'failed!',
                text: '{{ session('failed') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#dc3545',
                iconColor: '#ffffff',
                customClass: {
                    title: 'text-white',
                    content: 'text-white'
                }
            });
        </script>
    @endif
</body>

</html>
