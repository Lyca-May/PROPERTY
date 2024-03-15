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
                            <a href="{{ url('/stock-card-form') }}" class="card">
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
                    @foreach ($stock_card as $stock_cards)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-12">
                            <!-- Modal trigger element -->
                            <a class="card2" href="#" data-toggle="modal"
                                data-target="#editItemModal{{ $stock_cards->id }}">
                                <div class="card-body">
                                    <h3 class="card-title">ENTITY NAME: {{ $stock_cards->entity_name }}</h3>
                                    <h3 class="card-title">FUND CLUSTERE: {{ $stock_cards->fund_cluster }}</h3>
                                    <h3 class="card-text small">ITEM NAME: {{ $stock_cards->item_name }}</h3>
                                    <p class="card-text small">ITEMCODE/STOCK NO: {{ $stock_cards->stock_no }}</p>
                                </div>
                                <div class="go-corner" href="#">
                                    <div class="go-arrow">
                                        →
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="modal fade" id="editItemModal{{ $stock_cards->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editItemModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-custom-width" role="document">
                                <!-- Added modal-custom-width class -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editItemModalLabel">View or Edit Stock Card</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ url('/edit-stock-card/' . $stock_cards->id) }}" method="POST">
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
                                                                        value="{{ $stock_cards->entity_name }}">
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
                                                                        value="{{ $stock_cards->fund_cluster }}">
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
                                                                            <th scope="row">Item:</th>
                                                                            <td>
                                                                                <input type="text" name="item_name"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->item_name }}">
                                                                                @error('item_name')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <th scope="row">Stock No:</th>
                                                                            <td>
                                                                                <input type="text" name="stock_no"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->stock_no }}"">
                                                                                @error('stock_no')
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
                                                                                    value="{{ $stock_cards->description }}">
                                                                                @error('description')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <th scope="row">Re-Order Point
                                                                            </th>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="reorder_point"class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->reorder_point }}">
                                                                                @error('reorder_point')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Unit of
                                                                                Measurement:
                                                                            </th>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="unit_of_measurement"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->unit_of_measurement }}">
                                                                                @error('unit_of_measurement')
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
                                                    <div class="col-lg-12">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col" colspan="2">
                                                                            </th>
                                                                            <th scope="col" colspan="3"
                                                                                style="text-align: center;">
                                                                                RECEIPT
                                                                            </th>
                                                                            <th scope="col" colspan="3"
                                                                                style="text-align: center;">
                                                                                ISSUE</th>
                                                                            <th scope="col" colspan="3"
                                                                                style="text-align: center;">
                                                                                BALANCE
                                                                            </th>
                                                                            <th scope="col" colspan="3"
                                                                                style="text-align: center;">
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                DATE</th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                REFERENCE
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">QTY
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                UNIT COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                TOTAL COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">QTY
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                UNIT COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                TOTAL COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">QTY
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                UNIT COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">
                                                                                TOTAL COST
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="text-align: center;">NO
                                                                                OF DAYS
                                                                                TO
                                                                                CONSUME</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="date" name="date"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->date }}">
                                                                                @error('date')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="reference"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->reference }}">
                                                                                @error('reference')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="receipt_qty"
                                                                                    id="receipt_qty"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->receipt_qty }}"
                                                                                    data-card-id="{{ $stock_cards->id }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="receipt_unitcost"
                                                                                    id="receipt_unitcost"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->receipt_unitcost }}"
                                                                                    data-card-id="{{ $stock_cards->id }}"data-card-id="{{ $stock_cards->id }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="receipt_totalcost"
                                                                                    id="receipt_totalcost"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->receipt_totalcost }}"
                                                                                    readonly
                                                                                    data-card-id="{{ $stock_cards->id }}">
                                                                            </td>
                                                                            <!-- Issue section -->
                                                                            <td>
                                                                                <input type="text" name="issue_qty"
                                                                                    id="issue_qty"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->issue_qty }}"
                                                                                    data-card-id="{{ $stock_cards->id }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="issue_unitcost"
                                                                                    id="issue_unitcost"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->issue_unitcost }}"
                                                                                    data-card-id="{{ $stock_cards->id }}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="issue_totalcost"
                                                                                    id="issue_totalcost"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->issue_totalcost }}"
                                                                                    readonly
                                                                                    data-card-id="{{ $stock_cards->id }}">
                                                                            </td>
                                                                            <!-- Bal section -->
                                                                            <td>
                                                                                <input type="text" name=""
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder="" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name=""
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder="" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    placeholder="" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    name="no_of_days"
                                                                                    class="form-control text-line"
                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                    value="{{ $stock_cards->no_of_days }}">
                                                                                @error('no_of_days')
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
                                                        href="{{ url('/view-slc/' . $stock_cards->id) }}">View Stock
                                                        Ledger Card</a>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    {{-- Buttons positioned to the right --}}
                                                    <button type="submit" class="btn btn-primary">Save
                                                        Changes</button>
                                                    <button type="submit" class="btn btn-success"
                                                        onclick="window.print()">Export</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Function to calculate total cost for a specific card
                            function calculateTotalCost(cardId) {
                                var qty = parseFloat(document.getElementById('receipt_qty_' + cardId).value) || 0;
                                var unitCost = parseFloat(document.getElementById('receipt_unitcost_' + cardId).value) || 0;
                                var totalCost = qty * unitCost;
                                document.getElementById('receipt_totalcost_' + cardId).value = totalCost.toFixed(2);
                            }

                            // Automatically calculate total cost for receipt section when quantity or unit cost changes
                            document.querySelectorAll('[id^="receipt_qty"]').forEach(function(element) {
                                element.addEventListener('input', function() {
                                    var cardId = element.dataset.cardId;
                                    calculateTotalCost(cardId);
                                });
                            });

                            document.querySelectorAll('[id^="receipt_unitcost"]').forEach(function(element) {
                                element.addEventListener('input', function() {
                                    var cardId = element.dataset.cardId;
                                    calculateTotalCost(cardId);
                                });
                            });

                            // Initial calculation for all cards on page load
                            document.addEventListener('DOMContentLoaded', function() {
                                document.querySelectorAll('[id^="receipt_qty"]').forEach(function(element) {
                                    var cardId = element.dataset.cardId;
                                    calculateTotalCost(cardId);
                                });
                            });
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
    {{-- Footer --}}
    @include('footer')


</body>

</html>
