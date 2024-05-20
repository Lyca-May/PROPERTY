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
                                    <br>
                                    <div class="row card-row">
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

                                        <div class="centered-card">
                                            <div class="card"
                                                style="width:240%; margin-left:30px; margin-top:30px;">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thead-dark">
                                                                <tr>
                                                                    <th>Entity Name</th>
                                                                    <th>Name</th>
                                                                    <th>Description</th>
                                                                    <th>Item Code</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($stock_card as $stock_cards)
                                                                    <tr>
                                                                        <td>{{ $stock_cards->entity_name }}</td>
                                                                        <td>{{ $stock_cards->item_name }}</td>
                                                                        <td>{{ $stock_cards->description }}</td>
                                                                        <td>{{ $stock_cards->item_code }}</td>
                                                                        <td>
                                                                            <!-- View icon to trigger modal -->
                                                                            <a href="#" class="view-icon"
                                                                                data-toggle="modal"
                                                                                data-target="#editItemModal{{ $stock_cards->id }}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($stock_card as $stock_cards)
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
                                                                                                    colspan="2"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE</th>
                                                                                                <th scope="col"
                                                                                                    colspan="2"
                                                                                                    style="text-align: center;">
                                                                                                    BALANCE
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="2"
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
                                                                                                    OFFICE/OFFICER
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    QTY
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
                                                                                                        data-card-id="{{ $stock_cards->id }}"
                                                                                                        hidden>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="office_officer"
                                                                                                        id="office_officer"
                                                                                                        class="form-control text-line issue-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->office_officer }}"
                                                                                                        hidden>
                                                                                                </td>

                                                                                                <!-- Bal section -->
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="bal_qty"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $stock_cards->receipt_qty }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        name="bal_totalcost"
                                                                                                        value="{{ $stock_cards->receipt_totalcost }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="no_of_days"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->no_of_days }}"
                                                                                                        hidden>
                                                                                                    @error('no_of_days')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class="add"
                                                                                                        title="Add"
                                                                                                        data-edit-id="{{ $stock_cards->id }} "
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE03B;</i></a>
                                                                                                    <a class="edit"
                                                                                                        title="Edit"
                                                                                                        data-edit-id="{{ $stock_cards->id }} "
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE254;</i></a>
                                                                                                    <a class="delete"
                                                                                                        title="Delete"
                                                                                                        data-del-id="{{ $stock_cards->id }}"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE872;</i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            @foreach ($stock_ext->where('stock_id', $stock_cards->id) as $data)
                                                                                                <tr>
                                                                                                    <td><input
                                                                                                            type="date"
                                                                                                            value="{{ $data->date }}"
                                                                                                            name="date"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <textarea type="text" name="reference" class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{ $data->reference }}</textarea>
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="hidden"
                                                                                                            name="receipt_qty"
                                                                                                            value=""
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-qty"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="hidden"
                                                                                                            name="receipt_unitcost"
                                                                                                            value=""
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-unitost"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="hidden"
                                                                                                            name="receipt_totalcost"
                                                                                                            value=""
                                                                                                            class="form-control text-line receipt-total"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="issue_qty"
                                                                                                            value="{{ $data->issue_qty }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="office_officer"
                                                                                                            value="{{ $data->office_officer }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="bal_qty">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="new_bal_qty"
                                                                                                            id="bal-qty {{ $data->id }} "
                                                                                                            value="{{ $data->new_bal_qty }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="bal_totalcost"
                                                                                                            value="{{ $data->bal_totalcost }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="no_of_days"
                                                                                                            value="{{ $data->no_of_days }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a class="add"
                                                                                                            title="Add"
                                                                                                            data-edit-add-stockid="{{ $stock_cards->id }} "
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE03B;</i></a>
                                                                                                        <a class="edit"
                                                                                                            title="Edit"
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-edit-id="{{ $stock_cards->id }} "
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE254;</i></a>
                                                                                                        <a class="delete"
                                                                                                            title="Delete"
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE872;</i></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <button type="button"
                                                                            data-stock-id="{{ $stock_cards->id }}"
                                                                            class="btn btn-info add-new"><i
                                                                                class="fa fa-plus"></i>
                                                                            Add New</button>
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        <button type="button"
                                                                            onclick="navigateToPrintablePage('{{ $stock_cards->id }}')"
                                                                            class="btn btn-success">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-printer">
                                                                                <path d="M6 9V2H18V9"></path>
                                                                                <path d="M18 14H20V20H4V14H6"></path>
                                                                                <path d="M16 18H8"></path>
                                                                                <path d="M16 12H8"></path>
                                                                            </svg>
                                                                        </button>

                                                                        <script>
                                                                            function navigateToPrintablePage(propId) {
                                                                                window.location.href = '/printable-stock-page/' + propId;
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </form>

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
            var csrfToken = "{{ csrf_token() }}";
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();

                $(document).on('click', '.add-new', function(event) {
                    event.preventDefault();

                    var stockId = $(this).data("stock-id");
                    var modal = $('#editItemModal' + stockId);
                    var table = modal.find('.table-bordered.table-resizable tbody');
                    var editId = $(this).data("edit-id");
                    var actions =
                        '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
                        '<a class="edit" title="Edit" data-edit-id="' + editId +
                        '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
                        '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

                    var row = $('<tr>').append(
                        $('<td>').append(
                            '<input type="date" class="form-control text-line" name="date" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="reference" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="hidden" class="form-control text-line receipt-input" name="" id="receipt_qty" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'
                        ),
                        $('<td>').append(
                            '<input type="hidden" class="form-control text-line receipt-input" name="" id="receipt_unitcost" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'
                        ),
                        $('<td>').append(
                            '<input type="hidden" class="form-control text-line receipt-total" name="" id="receipt_totalcost" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line issue-input" name="issue_qty" id="issue_qty" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line issue-total" name="office_officer" id="office_officer" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="new_bal_qty" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="bal_totalcost" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="no_of_days" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(actions),
                        $('<td hidden>').append('<input type="text" name="stock_id" value="' + stockId +
                            '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                        )
                    );

                    table.append(row);
                    var rowCount = table.find("tr").length;
                    console.log("rowCount:", rowCount);

                    if (rowCount === 2) {
                        console.log("row 2 has been added.");

                        $(document).on("input",
                            '.modal-body input[name="receipt_qty"], .modal-body input[name="issue_qty"]',
                            function() {
                                console.log("Calculating balance...");
                                var receiptQty = $(this).closest(".modal-body").find(
                                    'input[name="receipt_qty"]').val() || 0;
                                var unitCost = parseFloat($(this).closest(".modal-body").find(
                                    'input[name="receipt_unitcost"]').val()) || 0;
                                var issueQty = $(this).closest("tr").find('input[name="issue_qty"]')
                                    .val() || 0;

                                var balanceQty = receiptQty - issueQty;
                                var balanceTotal = unitCost * balanceQty;

                                console.log("Balance calculated. Quantity:", balanceQty, "Amount:",
                                    balanceTotal);

                                $(this).closest("tr").find('input[name="new_bal_qty"]').val(balanceQty);
                                $(this).closest("tr").find('input[name="bal_totalcost"]').val(balanceTotal
                                    .toFixed(2));
                            });
                    } else if (rowCount > 2) {
                        console.log("more than 2 rows have been added.");

                        // Ensure that the elements targeted by the selector exist
                        console.log("Checking elements existence...");
                        $(document).on("input",
                            ' input[name="bal_qty"], input[name="issue_qty"], input[name="bal_totalcost"]',
                            function() {
                                console.log("Calculating new balance...");
                                var $row = $(this).closest("tr");
                                // Get the index of the current row
                                var index = $row.index();
                                if (index > 1 && index < $("table tbody tr").length) {
                                    var prevRowBalQtyInput = $row.prev().prev().find(
                                        'input[name="new_bal_qty"]');
                                    var prevRowBalQtyValue = prevRowBalQtyInput.val();
                                    var prevRowBalQty = parseFloat(
                                        prevRowBalQtyValue); // Define prevRowBalQty here
                                    console.log("Previous Row Bal Qty:", prevRowBalQty);
                                    var unitCost = parseFloat($(this)
                                        .closest(".modal-body")
                                        .find('input[name="receipt_unitcost"]')
                                        .val());
                                    console.log("Unitcost:", unitCost);
                                    var issueQty = parseFloat(table.find(
                                        'tr:last-child input[name="issue_qty"]').val());

                                    console.log("Issue Qty:", issueQty);


                                    var newBalQty = prevRowBalQty - issueQty;

                                    var newBalTotalCost = unitCost * newBalQty;
                                    console.log("New Bal Qty:", newBalQty);
                                    console.log("New Bal TotalCost:", newBalTotalCost);
                                    $row.find('input[name="new_bal_qty"]').val(newBalQty);
                                    $row.find('input[name="bal_totalcost"]').val(newBalTotalCost);
                                } else {
                                    console.log("NO VALUE FOR THE PREVIOUS BAL QTY");
                                }
                            });

                    }
                    $("table tbody tr:last-child").find(".add").show();
                    $("table tbody tr:last-child").find(".edit").hide();
                    $('[data-toggle="tooltip"]').tooltip();
                });

                $(document).on("click", ".add", function() {
                    var csrfToken = "{{ csrf_token() }}";
                    var rowData = {};
                    var input = $(this).parents("tr").find(
                        'input[type="text"], input[type="date"], textarea');

                    input.each(function() {
                        var name = $(this).attr("name");
                        var value = $(this).val();
                        rowData[name] = value;
                    });
                    // var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "POST",
                        url: "/add-stock-extension",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        data: JSON.stringify(rowData), // Ensure the data is sent as JSON
                        contentType: "application/json", // Set the content type to JSON
                        success: function(response) {
                            var newRow = "<tr>";
                            Object.values(rowData).forEach(function(value) {
                                newRow += "<td>" + value + "</td>";
                            });
                            newRow += "<td>" + actions + "</td></tr>";
                            $("table tbody").append(newRow);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        },
                    });

                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                });

                $(document).on("click", ".edit", function() {
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-id");

                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-stock-ext-data/" + editId,
                            success: function(response) {
                                var rowData = response;
                                row.find("td:not(:last-child)").each(function() {
                                    var fieldName = $(this).data("field-name");
                                    if (fieldName) {
                                        var value = rowData[fieldName];
                                        // Check if the field is an input field
                                        var inputField = $('<input>', {
                                            type: 'text',
                                            class: 'form-control',
                                            name: fieldName,
                                            value: value
                                        });
                                        $(this).html(inputField);
                                    }
                                });

                                // Show the save button and hide the edit button
                                row.find(".add").show();
                                row.find(".edit").hide();
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error(xhr.responseText);
                            },
                        });
                    } else {
                        console.error("editId is undefined");
                    }
                });


                $(document).on("click", ".add", function() {
                    var row = $(this).closest("tr");
                    var stockId = $(this).data("edit-add-stockid");
                    var editId = $(this).data("edit-id");
                    var rowData = {
                        prop_id: stockId,
                    };

                    // Collect the updated data from the row
                    row.find('input[type="text"], input[type="checkbox"]').each(
                        function() {
                            var fieldName = $(this).attr("name");
                            var value = $(this).is(":checkbox") ?
                                $(this).is(":checked") :
                                $(this).val();
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
                        url: "/update-stock-ext-data/" + editId, // Use editId in the URL
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        data: rowData,
                        success: function(response) {
                            // Optionally, handle success response
                            console.log("Data updated successfully!");
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        },
                    });
                    row.find(".edit").show();
                    row.find(".add").hide();
                });

                // $(document).on("click", ".delete", function() {
                //     var editId = $(this).data("edit-id");
                //     var $deleteButton = $(this); // Store reference to the delete button

                //     // Perform an AJAX request to delete the data on the server
                //     $.ajax({
                //         type: "DELETE", // Use DELETE method
                //         url: "/delete-stockext-data/" + editId, // Use editId in the URL
                //         headers: {
                //             "X-CSRF-TOKEN": csrfToken,
                //         },
                //         success: function(response) {
                //             // Optionally, handle success response
                //             console.log("Data deleted successfully!");
                //             // Remove the row from the table after successful deletion
                //             $deleteButton.closest("tr")
                //                 .remove(); // Use the stored reference to deleteButton
                //         },
                //         error: function(xhr, status, error) {
                //             // Handle error
                //             console.error(xhr.responseText);
                //         },
                //     });
                // });
            });
        </script>
        {{-- <script>
            $(document).ready(function() {
                $(document).on("click", ".edit", function() {
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-id");

                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-stock-data/" + editId,
                            success: function(response) {
                                var rowData = response;
                                row.find("td:not(:last-child)").each(function() {
                                    var fieldName = $(this).data("field-name");
                                    if (fieldName) {
                                        var value = rowData[fieldName];
                                        // Check if the field is an input field
                                        var inputField = $('<input>', {
                                            type: 'text',
                                            class: 'form-control',
                                            name: fieldName,
                                            value: value
                                        });
                                        $(this).html(inputField);
                                    }
                                });

                                // Show the save button and hide the edit button
                                row.find(".add").show();
                                row.find(".edit").hide();
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error(xhr.responseText);
                            },
                        });
                    } else {
                        console.error("editId is undefined");
                    }
                });


                $(document).on("click", ".add", function() {
                    var row = $(this).closest("tr");
                    var stockId = $(this).data("edit-id");
                    var rowData = {};

                    // Collect the updated data from the row
                    row.find('input[type="text"], input[type="checkbox"]').each(function() {
                        var fieldName = $(this).attr("name");
                        var value = $(this).is(":checkbox") ? $(this).is(":checked") : $(this).val();
                        rowData[fieldName] = value;
                    });

                    // Set the ID value if available
                    if (stockId) {
                        rowData.id = stockId;
                    }

                    // Perform an AJAX request to update the data on the server
                    $.ajax({
                        type: "POST",
                        url: "/update-stock-data/" + stockId, // Use stockId in the URL
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        data: rowData,
                        success: function(response) {
                            // Optionally, handle success response
                            console.log("Data updated successfully!");
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        },
                    });

                    // Show edit and hide add button
                    row.find(".edit").show();
                    row.find(".add").hide();
                });


                $(document).on("click", ".delete", function() {
                    var delId = $(this).data("del-id");
                    var $deleteButton = $(this); // Store reference to the delete button

                    // Perform an AJAX request to delete the data on the server
                    $.ajax({
                        type: "DELETE", // Use DELETE method
                        url: "/delete-stock-data/" + delId, // Use editId in the URL
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        success: function(response) {
                            // Optionally, handle success response
                            console.log("Data deleted successfully!");
                            // Remove the row from the table after successful deletion
                            $deleteButton.closest("tr")
                                .remove(); // Use the stored reference to deleteButton
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        },
                    });
                });
            })
        </script> --}}

        @include('footer')
        <script>
            $(document).ready(function() {
                $("#search-input").on("keyup", function() {
                    var searchText = $(this).val().toLowerCase();

                    $(".table tbody tr").each(function() {
                        var rowData = $(this).text().toLowerCase();

                        if (rowData.indexOf(searchText) === -1 && searchText !== "") {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                });
            });
        </script>

    </div>
</body>

</html>
