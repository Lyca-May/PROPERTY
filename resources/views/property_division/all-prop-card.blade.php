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
    <!-- ================= Favicon ================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        .card:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            cursor: pointer;
        }

        .card:hover {
            background-color: #f0f0f0;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #print-content,
            #print-content * {
                visibility: visible;
            }
        }
    </style>
</head>

<body>
    @include('navbar')
    @include('sidebar')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                {{-- <section id="main-content"> --}}
                {{-- Top-left: Card with Add Button --}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <a href="{{ url('/property-card-form') }}" class="card">
                                <div class="card-body text-center" style="font-size: 30px">+
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>


                <div class="col-md-6">
                    <form id="search-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" id="search-input">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </form>
                </div>


                <div class="row card-row">
                    @foreach ($prop_card as $prop_cards)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-12">
                            <!-- Modal trigger element -->
                            <a class="card2" href="#" data-toggle="modal"
                                data-target="#editItemModal{{ $prop_cards->id }}">
                                <div class="card-body">
                                    <h3 class="card-title">ENTITY NAME: {{ $prop_cards->entity_name }}</h3>
                                    <h3 class="card-title">FUND CLUSTERE: {{ $prop_cards->fund_cluster }}</h3>
                                    <h3 class="card-text small">NAME: {{ $prop_cards->prop_plant_eq }}</h3>
                                    <p class="card-text small">Property No/Object Account Code:
                                        {{ $prop_cards->prop_no }}</p>
                                </div>
                                <div class="go-corner" href="#">
                                    <div class="go-arrow">
                                        →
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="modal fade" id="editItemModal{{ $prop_cards->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editItemModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-custom-width" role="document">
                                <!-- Added modal-custom-width class -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editItemModalLabel">View or Edit Property Card</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ url('/edit-property-card/' . $prop_cards->id) }}" method="POST">
                                            @csrf
                                            <div id="print-content" class="modal-body">
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label">
                                                                    Entity Name
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="entity_name"
                                                                        class="form-control text-line"
                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                        value="{{ $prop_cards->entity_name }}">
                                                                    @error('entity_name')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
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
                                                                    <input type="text" name="fund_cluster"
                                                                        class="form-control text-line"
                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                        value="{{ $prop_cards->fund_cluster }}">
                                                                    @error('fund_cluster')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
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
                                                                            <th scope="row">Property,Plant &
                                                                                Equipment:</th>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="prop_plant_eq"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $prop_cards->prop_plant_eq }}">
                                                                                @error('prop_plant_eq')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <th scope="row">:</th>
                                                                            <td>
                                                                                <input type="text" name="prop_no"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $prop_cards->prop_no }}"">
                                                                                @error('prop_no')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Description:
                                                                            </th>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="description"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $prop_cards->description }}">
                                                                                @error('description')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
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
                                                                            <th scope="col" colspan="3"
                                                                                style="text-align: center;">RECEIPT
                                                                            </th>
                                                                            <th scope="col" colspan="2"
                                                                                style="text-align: center;">
                                                                                ISSUE/TRANSFER/DISPOSAL</th>
                                                                            <th scope="col" colspan="1"
                                                                                style="text-align: center;">BALANCE
                                                                            </th>
                                                                            <th scope="col" colspan="2"
                                                                                style="text-align: center;"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col"
                                                                                style="text-align: center;">DATE</th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">REFERENCE
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">QTY</th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">UNIT COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">TOTAL COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">QTY</th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">OFFICE
                                                                                OFFICER</th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">QTY</th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">AMOUNT</th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">REMARKS
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="date" name="date"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder=""
                                                                                    value="{{ $prop_cards->date }}">
                                                                                @error('date')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <textarea type="text" name="reference" class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;" placeholder="@error('reference') {{ $message }} @enderror"
                                                                                    >{{ $prop_cards->reference }}</textarea>
                                                                                @error('reference')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="receipt_qty"
                                                                                    id="receipt_qtyy"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $prop_cards->receipt_qty }}"
                                                                                    placeholder="">
                                                                                @error('receipt_qty')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="receipt_unitcost"
                                                                                    id="receipt_unitcost"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $prop_cards->receipt_unitcost }}"
                                                                                    placeholder="">
                                                                                @error('receipt_unitcost')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="receipt_totalcost"
                                                                                    id="receipt_totalcost"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder=""
                                                                                    value="{{ $prop_cards->receipt_totalcost }}"
                                                                                    readonly>
                                                                                @error('receipt_totalcost')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="issue_qty"
                                                                                    id="issue_qty"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder=""
                                                                                    value="{{ $prop_cards->issue_qty }}">
                                                                                @error('issue_qty')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="issue_office_officer"
                                                                                    id="issue_office_officer"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder=""
                                                                                    value="{{ $prop_cards->issue_office_officer }}">
                                                                                @error('issue_office_officer')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="bal_qty"
                                                                                    id=""
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder="" readonly
                                                                                    value="{{ $prop_cards->bal_qty }}">
                                                                                @error('bal_qty')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="repair_amount"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder=""
                                                                                    value="{{ $prop_cards->repair_amount }}">
                                                                                @error('repair_amount')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>

                                                                            <td>
                                                                                <textarea type="text" name="remarks"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder="">{{ $prop_cards->remarks }}</textarea>
                                                                                @error('remarks')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="col-md-6">
                                                    {{-- Button positioned to the left --}}
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ url('/view-ppelc/' . $prop_cards->id) }}">View PPE Ledger Card</a>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    {{-- Buttons positioned to the right --}}
                                                    <button type="submit" class="btn btn-primary">Save
                                                        Changes</button>
                                                        <button type="button" onclick="navigateToPrintablePage()" class="btn btn-success ">Preview</button>

                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Function to calculate receipt total cost
                            function calculateReceiptTotalCost() {
                                var receiptQty = parseFloat(document.getElementById("receipt_qtyy").value);
                                var receiptUnitCost = parseFloat(document.getElementById("receipt_unitcost").value);
                                var receiptTotalCost = receiptQty * receiptUnitCost;
                                document.getElementById("receipt_totalcost").value = receiptTotalCost.toFixed(2); // Adjust to your required precision
                            }

                            // Function to calculate issue total cost
                            function calculateIssueTotalCost() {
                                var issueQty = parseFloat(document.getElementById("issue_qty").value);
                                var issueUnitCost = parseFloat(document.getElementById("issue_unitcost").value);
                                var issueTotalCost = issueQty * issueUnitCost;
                                document.getElementById("issue_totalcost").value = issueTotalCost.toFixed(2); // Adjust to your required precision
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
                    @endforeach
                </div>
                <!-- Modal -->

                <script>
                    $(document).ready(function() {
                        $('#search-input').on('keyup', function() {
                            var searchText = $(this).val().toLowerCase();
                            $('.card-row .card2').each(function() {
                                var entityName = $(this).find('.card-title:first').text().toLowerCase();
                                var fundCluster = $(this).find('.card-title:nth-child(2)').text().toLowerCase();
                                var itemName = $(this).find('.card-text').text().toLowerCase();
                                if (entityName.indexOf(searchText) === -1 && fundCluster.indexOf(searchText) ===
                                    -1 && itemName.indexOf(searchText) === -1) {
                                    $(this).hide();
                                } else {
                                    $(this).show();
                                }
                            });
                        });
                    });
                </script>

                </section>

            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    <script>
        // Function to navigate to the printable page
        function navigateToPrintablePage() {
            // Assuming 'prop_cards_id' is the parameter to be passed
            var prop_cards_id = '{{ $prop_cards->id }}';
            // Navigate to the printable page
            window.location.href = '/printable-prop-page/' + prop_cards_id;
        }
    </script>
    {{-- Footer --}}
    @include('footer')


</body>

</html>
