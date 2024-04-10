<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('navbar')
            @include('sidebar')

            <div class="main-content">
                <section class="section">
                    <h1 class="section-header">
                        <div>Stock Cards | Overview</div>
                    </h1>
                    <div class="row">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3"
                                        role="tab" aria-controls="home" aria-selected="true">All Cards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3"
                                        role="tab" aria-controls="profile" aria-selected="false">New Form</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                        role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <a href="{{ url('/stock-card-form') }}" class="card">
                                                    <div class="card-body text-center" style="font-size: 20px">+ Add new
                                                        stock card
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <form id="search-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search"
                                                    id="search-input" style="width: 300px;">
                                                <div class="input-group-append">
                                                    <!-- Add your search button or other elements here -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <br>
                                    <div class="row card-row">
                                        @foreach ($stock_card as $stock_cards)
                                            <div class="col-lg-3 col-md-6 col-sm-12 mb-12">
                                                {{-- <div class="card"> --}}
                                                <!-- Modal trigger element -->
                                                <a class="card2" href="#" data-toggle="modal"
                                                    data-target="#editItemModal{{ $stock_cards->id }}">
                                                    <div class="card-body">
                                                        <h3 class="card-title">ENTITY NAME:
                                                            {{ $stock_cards->entity_name }}
                                                        </h3>
                                                        <h3 class="card-title">FUND CLUSTER:
                                                            {{ $stock_cards->fund_cluster }}
                                                        </h3>
                                                        <h3 class="card-text small">ITEM NAME:
                                                            {{ $stock_cards->item_name }}
                                                        </h3>
                                                        <p class="card-text small">ITEMCODE/STOCK NO:
                                                            {{ $stock_cards->stock_no }}
                                                        </p>
                                                    </div>
                                                    <div class="go-corner" href="#">
                                                        <div class="go-arrow">→</div>
                                                    </div>
                                                </a>
                                                {{-- </div> --}}
                                            </div>

                                            <div class="modal fade" id="editItemModal{{ $stock_cards->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-custom-width" role="document">
                                                    <!-- Added modal-custom-width class -->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editItemModalLabel">View or Edit
                                                                Stock Card</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="myForm"
                                                                action="{{ url('/edit-stock-card/' . $stock_cards->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div id="print-content" class="modal-body">
                                                                    <div class="card-block">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group row">
                                                                                    <label
                                                                                        class="col-md-6 col-form-label">
                                                                                        Entity Name
                                                                                    </label>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text"
                                                                                            name="entity_name"
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
                                                                                    <label
                                                                                        class="col-md-6 col-form-label">
                                                                                        Fund Cluster
                                                                                    </label>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text"
                                                                                            name="fund_cluster"
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
                                                                                <div class="table-responsive ">
                                                                                    <table
                                                                                        class="table table-bordered">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <th scope="row">
                                                                                                    Item:</th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="item_name"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->item_name }}">
                                                                                                    @error('item_name')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <th scope="row">
                                                                                                    Stock No:</th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="stock_no"
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
                                                                                                <th scope="row">
                                                                                                    Description:
                                                                                                </th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="description"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->description }}">
                                                                                                    @error('description')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <th scope="row">
                                                                                                   Item Code:
                                                                                                </th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="item_code"class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->item_code }}">
                                                                                                    @error('item_code')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row">Unit
                                                                                                    of
                                                                                                    Measurement:
                                                                                                </th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="unit_of_measurement"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->unit_of_measurement }}">
                                                                                                    @error('unit_of_measurement')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <th scope="row">
                                                                                                    Re-Order Point
                                                                                                </th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="reorder_point"class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->reorder_point }}">
                                                                                                    @error('reorder_point')
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
                                                                                    <table
                                                                                        class="table table-bordered">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col"
                                                                                                    colspan="2">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
                                                                                                    style="text-align: center;">
                                                                                                    RECEIPT
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="4"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE</th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
                                                                                                    style="text-align: center;">
                                                                                                    BALANCE
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
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
                                                                                                    style="text-align: center;">
                                                                                                    QTY
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
                                                                                                    style="text-align: center;">
                                                                                                    QTY
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
                                                                                                    style="text-align: center;">
                                                                                                    OFFICE/OFFICER
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    QTY
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
                                                                                                    style="text-align: center;">
                                                                                                    NO
                                                                                                    OF DAYS
                                                                                                    TO
                                                                                                    CONSUME</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody id="stockTableBody">
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="date"
                                                                                                        name="date"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->date }}">
                                                                                                    @error('date')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="reference"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->reference }}">
                                                                                                    @error('reference')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="receipt_qty"
                                                                                                        id="receipt_qtyy"
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->receipt_qty }}"
                                                                                                        placeholder="">
                                                                                                    @error('receipt_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="receipt_unitcost"
                                                                                                        id="receipt_unitcost"
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->receipt_unitcost }}"
                                                                                                        placeholder="">
                                                                                                    @error('receipt_unitcost')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="receipt_totalcost"
                                                                                                        id="receipt_totalcost"
                                                                                                        class="form-control text-line receipt-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->receipt_totalcost }}"
                                                                                                        readonly>
                                                                                                    @error('receipt_totalcost')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <!-- Issue section -->
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_qty"
                                                                                                        id="issue_qty"
                                                                                                        class="form-control text-line issue-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->issue_qty }}"
                                                                                                        data-card-id="{{ $stock_cards->id }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_unitcost"
                                                                                                        id="issue_unitcost"
                                                                                                        class="form-control text-line issue-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->issue_unitcost }}"
                                                                                                        data-card-id="{{ $stock_cards->id }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_totalcost"
                                                                                                        id="issue_totalcost"
                                                                                                        class="form-control text-line issue-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->issue_totalcost }}"
                                                                                                        readonly
                                                                                                        data-card-id="{{ $stock_cards->id }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="office_officer"
                                                                                                        id="office_officer"
                                                                                                        class="form-control text-line issue-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->office_officer }}">
                                                                                                </td>

                                                                                                <!-- Bal section -->
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="bal_qty"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $stock_cards->bal_qty }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="bal_unitcost"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $stock_cards->bal_unitcost }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        name="bal_totalcost"
                                                                                                        value="{{ $stock_cards->bal_totalcost }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
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
                                                                                    <button id="addRowButton">Add Row</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        {{-- Button positioned to the left --}}
                                                                        <a type="button" class="btn btn-danger"
                                                                            href="{{ url('/view-slc/' . $stock_cards->id) }}">View
                                                                            Stock Ledger Card</a>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        {{-- Buttons positioned to the right --}}
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                        <button type="button"
                                                                            onclick="navigateToPrintablePage()"
                                                                            class="btn btn-success ">Preview</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <script>
                                            const receiptInputs = document.querySelectorAll('.receipt-input');
                                            const issueInputs = document.querySelectorAll('.issue-input');

                                            receiptInputs.forEach(input => {
                                                input.addEventListener('input', updateReceiptTotalCost);
                                            });
                                            issueInputs.forEach(input => {
                                                input.addEventListener('input', updateIssueTotalCost);
                                            });

                                            function updateReceiptTotalCost(event) {
                                                const parentRow = event.target.closest('tr');
                                                const qty = parseFloat(parentRow.querySelector('[name="receipt_qty"]').value);
                                                const unitCost = parseFloat(parentRow.querySelector('[name="receipt_unitcost"]').value);
                                                const totalCost = qty * unitCost;
                                                parentRow.querySelector('[name="receipt_totalcost"]').value = isNaN(totalCost) ? '' : totalCost.toFixed(2);
                                            }
                                            function updateIssueTotalCost(event) {
                                                const parentRow = event.target.closest('tr');
                                                const issue_qty = parseFloat(parentRow.querySelector('[name="issue_qty"]').value);
                                                const issue_unitCost = parseFloat(parentRow.querySelector('[name="issue_unitcost"]').value);
                                                const issueTotalCost =  issue_qty * issue_unitCost
                                                parentRow.querySelector('[name="issue_totalcost"]').value = isNaN(issueTotalCost) ? '' : issueTotalCost.toFixed(2);
                                            }
                                        </script>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="profile3" role="tabpanel"
                                    aria-labelledby="profile-tab3">
                                </div>
                                <div class="tab-pane fade" id="contact3" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </section>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success ') }}',
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
                    text: '{{ session('failed ') }}',
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

        @include('footer')
    </div>


    <script>
        // Function to navigate to the printable page
        function navigateToPrintablePage() {
            // Assuming 'prop_cards_id' is the parameter to be passed
            var stock_cards_id = '{{ $stock_cards->id }}';
            // Navigate to the printable page
            window.location.href = '/printable-stock-page/' + stock_cards_id;
        }
    </script>

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


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
