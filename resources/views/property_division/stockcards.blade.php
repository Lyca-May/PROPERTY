<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PROPERTY AND SUPPLIES</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: auto;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Make table columns resizable */
        .table-resizable th {
            position: relative;
        }

        .table-resizable th::after {
            content: "";
            position: absolute;
            top: 0;
            right: -5px;
            bottom: 0;
            width: 10px;
            cursor: col-resize;
            z-index: 10;
            background-color: transparent;
        }

        .table-resizable th:hover::after {
            background-color: #f0f0f0;
        }
    </style>

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

                                                                        <div class="col-lg-12"
                                                                            style="margin-bottom: 20px">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label
                                                                                            class="col-form-label"><b>Item:</b></label>
                                                                                        <input type="text"
                                                                                            name="item_name"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $stock_cards->item_name }}">
                                                                                        @error('item_name')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                        <label
                                                                                            class="col-form-label"><b>
                                                                                                Stock
                                                                                                No:</b></label>

                                                                                        <input type="text"
                                                                                            name="stock_no"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $stock_cards->stock_no }}"">
                                                                                        @error('stock_no')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                        <label
                                                                                            class="col-form-label"><b>Description:</b></label>
                                                                                        <input type="text"
                                                                                            name="description"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $stock_cards->description }}">
                                                                                        @error('description')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label
                                                                                            class="col-form-label"><b>Item
                                                                                                Code:</b></label>

                                                                                        <input type="text"
                                                                                            name="item_code"class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $stock_cards->item_code }}">
                                                                                        @error('item_code')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror

                                                                                        <label
                                                                                            class="col-form-label"><b>Unit
                                                                                                of
                                                                                                Measurement:</b></label>

                                                                                        <input type="text"
                                                                                            name="unit_of_measurement"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $stock_cards->unit_of_measurement }}">
                                                                                        @error('unit_of_measurement')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                        <label
                                                                                            class="col-form-label"><b>
                                                                                                Re-Order
                                                                                                Point:</b></label>

                                                                                        <input type="text"
                                                                                            name="reorder_point"class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $stock_cards->reorder_point }}">
                                                                                        @error('reorder_point')
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
                                                                                    <table
                                                                                        class="table table-bordered table-resizable">
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
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ACTION</th>
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
                                                                                                <td>
                                                                                                    <a class="add"
                                                                                                        title="Add"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE03B;</i></a>
                                                                                                    <a class="edit"
                                                                                                        title="Edit"
                                                                                                        data-edit-id=""
                                                                                                        data-edit-id=""
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE254;</i></a>
                                                                                                    <a class="delete"
                                                                                                        title="Delete"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE872;</i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                {{-- <div class="row"> --}}
                                                                {{-- <div class="col-md-6"> --}}
                                                                {{-- Button positioned to the left --}}
                                                                {{-- <a type="button" class="btn btn-danger"
                                                                            href="{{ url('/view-slc/' . $stock_cards->id) }}">View
                                                                            Stock Ledger Card</a>
                                                                    </div>
                                                                    <div class="col-md-6 text-right"> --}}
                                                                {{-- Buttons positioned to the right --}}
                                                                {{-- <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                        <button type="button"
                                                                            onclick="navigateToPrintablePage()"
                                                                            class="btn btn-success ">Preview</button>
                                                                    </div>
                                                                </div> --}}
                                                            </form>
                                                            <button type="button"
                                                                data-stock-id="{{ $stock_cards->id }}"
                                                                class="btn btn-info add-new"><i
                                                                    class="fa fa-plus"></i>
                                                                Add New</button>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                                    const issueTotalCost = issue_qty * issue_unitCost
                                                    parentRow.querySelector('[name="issue_totalcost"]').value = isNaN(issueTotalCost) ? '' : issueTotalCost.toFixed(
                                                        2);
                                                }
                                            </script>
                                        @endforeach
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


                </section>
            </div>
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


        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
                var actions = $("table td:last-child").html();
                // Append table with add row form on add new button click
                $(".add-new").click(function() {
                    $(this).attr("disabled", "disabled");
                    var index = $("table tbody tr:last-child").index();
                    var row = '<tr>' +
                        '<td><input type="date" class="form-control text-line" name="date" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="reference" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line receipt-input" name="receipt_qty" id="receipt_qtyy" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value=""></td>' +
                        '<td><input type="text" class="form-control text-line receipt-input" name="receipt_unitcost" id="receipt_unitcost" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value=""></td>' +
                        '<td><input type="text" class="form-control text-line receipt-total" name="receipt_totalcost" id="receipt_totalcost" style="padding-top: 4px; padding-bottom: 4px;"  value=""></td>' +
                        '<td><input type="text" class="form-control text-line issue-input" name="issue_qty" id="issue_qty" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line issue-input" name="issue_unitcost" id="issue_unitcost" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line issue-total" name="issue_totalcost" id="issue_totalcost" style="padding-top: 4px; padding-bottom: 4px;"  value=""></td>' +
                        '<td><input type="text" class="form-control text-line issue-total" name="office_officer" id="office_officer" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="bal_qty" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="bal_unitcost" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="bal_totalcost" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="no_of_days" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td>' + actions + '</td>' +
                        '</tr>';
                    $("table").append(row);
                    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                    $('[data-toggle="tooltip"]').tooltip();
                });
                // Add row on add button click
                $(document).on("click", ".add", function() {
                    var empty = false;
                    var input = $(this).parents("tr").find('input[type="text"]');
                    input.each(function() {
                        if (!$(this).val()) {
                            $(this).addClass("error");
                            empty = true;
                        } else {
                            $(this).removeClass("error");
                        }
                    });
                    $(this).parents("tr").find(".error").first().focus();
                    if (!empty) {
                        input.each(function() {
                            $(this).parent("td").html($(this).val());
                        });
                        $(this).parents("tr").find(".add, .edit").toggle();
                        $(".add-new").removeAttr("disabled");
                    }
                });
                // Edit row on edit button click
                $(document).on("click", ".edit", function() {
                    $(this).parents("tr").find("td:not(:last-child)").each(function() {
                        $(this).html('<input type="text" class="form-control" value="' + $(this)
                            .text() + '">');
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").attr("disabled", "disabled");
                });
                // Delete row on delete button click
                $(document).on("click", ".delete", function() {
                    $(this).parents("tr").remove();
                    $(".add-new").removeAttr("disabled");
                });
            });
        </script>
        @include('footer')
    </div>
</body>

</html>
