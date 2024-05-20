<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VIEW SLC | ACCOUNTING</title>
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
            @include('accounting_division/navbar')
            @include('accounting_division/sidebar')

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
                                            <div class="card" style="width:210%; margin-left:30px; margin-top:30px;">
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
                                                                                                    colspan="3">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
                                                                                                    style="text-align: center;">
                                                                                                    RECEIPT
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE</th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
                                                                                                    style="text-align: center;">
                                                                                                    BALANCE
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan=""
                                                                                                    style="text-align: center;">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan=""
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
                                                                                                    PARTICULARS
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
                                                                                                   UNITCOST
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                   TOTALCOST
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    QTY
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    UNITCOST
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    TOTALCOST
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
                                                                                                    <textarea
                                                                                                        type="text"
                                                                                                        name="acctg_reference"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="">{{ $stock_cards->acctg_reference }}</textarea>
                                                                                                    @error('acctg_reference')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    @if ($stock_cards->receipt_qty != null)
                                                                                                        <textarea
                                                                                                            type="text"
                                                                                                            name="particulars"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            value="">Purchase</textarea>
                                                                                                        @error('particulars')
                                                                                                            <span
                                                                                                                class="text-danger">{{ $message }}</span>
                                                                                                        @enderror
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="receipt_qty"
                                                                                                        id="receipt_qty_{{ $stock_cards->id }}"
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->receipt_qty }}"
                                                                                                        placeholder=""
                                                                                                        oninput="calculateReceiptTotalCost({{ $stock_cards->id }})">
                                                                                                    @error('receipt_qty')
                                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="receipt_unitcost"
                                                                                                        id="receipt_unitcost_{{ $stock_cards->id }}"
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->receipt_unitcost }}"
                                                                                                        placeholder=""
                                                                                                        oninput="calculateReceiptTotalCost({{ $stock_cards->id }})">
                                                                                                    @error('receipt_unitcost')
                                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="receipt_totalcost"
                                                                                                        id="receipt_totalcost_{{ $stock_cards->id }}"
                                                                                                        class="form-control text-line receipt-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->receipt_totalcost }}"
                                                                                                        readonly>
                                                                                                    @error('receipt_totalcost')
                                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>

                                                                                                <script>
                                                                                                function calculateReceiptTotalCost(id) {
                                                                                                    var receiptQty = parseFloat(document.getElementById('receipt_qty_' + id).value) || 0;
                                                                                                    var receiptUnitCost = parseFloat(document.getElementById('receipt_unitcost_' + id).value) || 0;
                                                                                                    var receiptTotalCost = receiptQty * receiptUnitCost;

                                                                                                    document.getElementById('receipt_totalcost_' + id).value = receiptTotalCost.toFixed(2);
                                                                                                }
                                                                                                </script>

                                                                                                <!-- Issue section -->
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_qty"
                                                                                                        id="issue_qty"
                                                                                                        class="form-control text-line issue-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="0"
                                                                                                        hidden>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_qty"
                                                                                                        id="issue_qty"
                                                                                                        class="form-control text-line issue-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="0"
                                                                                                        hidden>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_qty"
                                                                                                        id="issue_qty"
                                                                                                        class="form-control text-line issue-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="0"
                                                                                                        hidden>
                                                                                                </td>

                                                                                                <!-- Bal section -->
                                                                                                <td>
                                                                                                    <input type="text" name="bal_qty" id="bal_qty_{{ $stock_cards->id }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="{{ $stock_cards->receipt_qty }}" oninput="calculateBalTotalCost({{ $stock_cards->id }})">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="bal_unitcost" id="bal_unitcost_{{ $stock_cards->id }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="{{ $stock_cards->receipt_unitcost }}" oninput="calculateBalTotalCost({{ $stock_cards->id }})">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" name="bal_totalcost" id="bal_totalcost_{{ $stock_cards->id }}" value="{{ $stock_cards->receipt_totalcost }}" readonly>
                                                                                                </td>

                                                                                                <script>
                                                                                                function calculateBalTotalCost(id) {
                                                                                                    var balQty = parseFloat(document.getElementById('bal_qty_' + id).value) || 0;
                                                                                                    var balUnitCost = parseFloat(document.getElementById('bal_unitcost_' + id).value) || 0;
                                                                                                    var balTotalCost = balQty * balUnitCost;

                                                                                                    document.getElementById('bal_totalcost_' + id).value = balTotalCost.toFixed(2);
                                                                                                }
                                                                                                </script>

                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="no_of_days"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $stock_cards->no_of_days }}"
                                                                                                        >
                                                                                                    @error('no_of_days')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class="edit"
                                                                                                        title="Edit"
                                                                                                        data-edit-seplc="{{ $stock_cards->id }}"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE254;</i></a>
                                                                                                    <a class="editadd"
                                                                                                        title="Add"
                                                                                                        data-edit-add-propid="{{ $stock_cards->id }}"
                                                                                                        data-toggle="tooltip">
                                                                                                        <i
                                                                                                            class="material-icons">check</i>
                                                                                                    </a>
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
                                                                                                        <textarea type="text" name="acctg_reference" class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{ $data->acctg_reference }}</textarea>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        @if ($data->issue_qty != null)
                                                                                                        <textarea type="text" name="particulars" class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;" placeholder="">Issuance</textarea>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="receipt_qty"
                                                                                                            value="0"
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-qty"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="" hidden>
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="receipt_unitcost"
                                                                                                            value="0"
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-unitost"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="" hidden>
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="receipt_totalcost"
                                                                                                            value="0"
                                                                                                            class="form-control text-line receipt-total"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;" hidden>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="text" name="issue_qty" id="issue_qty_{{ $data->id }}" value="{{ $data->issue_qty }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" oninput="calculateIssueTotalCost({{ $data->id }})">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="text" name="issue_unitcost" id="issue_unitcost_{{ $data->id }}" value="{{ $stock_cards->receipt_unitcost }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" oninput="calculateIssueTotalCost({{ $data->id }})">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="text" name="issue_totalcost" id="issue_totalcost_{{ $data->id }}" value="{{ $data->issue_totalcost }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                                                                    </td>

                                                                                                    <script>
                                                                                                    function calculateIssueTotalCost(id) {
                                                                                                        var issueQty = parseFloat(document.getElementById('issue_qty_' + id).value) || 0;
                                                                                                        var issueUnitCost = parseFloat(document.getElementById('issue_unitcost_' + id).value) || 0;
                                                                                                        var issueTotalCost = issueQty * issueUnitCost;

                                                                                                        document.getElementById('issue_totalcost_' + id).value = issueTotalCost.toFixed(2);
                                                                                                    }
                                                                                                    </script>

                                                                                                    <td class="bal_qty">
                                                                                                        <input type="text" name="new_bal_qty" id="new_bal_qty_{{ $data->id }}" value="{{ $data->new_bal_qty }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" oninput="calculateTotalCost({{ $data->id }})">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="text" name="bal_unitcost" id="bal_unitcost_{{ $data->id }}" value="{{ $stock_cards->receipt_unitcost }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" oninput="calculateTotalCost({{ $data->id }})">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="text" name="bal_totalcost" id="bal_totalcost_{{ $data->id }}" value="{{ $data->bal_totalcost }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                                                                    </td>
                                                                                                    <script>
                                                                                                        function calculateTotalCost(id) {
                                                                                                            var newBalQty = parseFloat(document.getElementById('new_bal_qty_' + id).value) || 0;
                                                                                                            var balUnitCost = parseFloat(document.getElementById('bal_unitcost_' + id).value) || 0;
                                                                                                            var balTotalCost = newBalQty * balUnitCost;

                                                                                                            document.getElementById('bal_totalcost_' + id).value = balTotalCost.toFixed(2);
                                                                                                        }
                                                                                                        </script>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="no_of_days"
                                                                                                            value="{{ $data->no_of_days }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a class="edit-data"
                                                                                                            title="Edit"
                                                                                                            data-edit-seplc="{{ $data->id }}"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE254;</i></a>
                                                                                                        <a class="add-upd"
                                                                                                            title="Add"
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-toggle="tooltip">
                                                                                                            <i
                                                                                                                class="material-icons">check</i>
                                                                                                        </a>
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
            $(document).ready(function() {
            var csrfToken = "{{ csrf_token() }}";

                // Click event handler for the "edit" icon
                $(document).on("click", ".edit-data", function() {
                    console.log("Edit icon clicked");
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-seplc");
                    var clickedEdit = $(this); // Store reference to the clicked element

                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-slc-data/" + editId,
                            success: function(response) {
                                var rowData = response;
                                row.find("td:not(:last-child)").each(function() {
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

                                clickedEdit.hide(); // Hide the clicked "edit" icon
                                clickedEdit.siblings(".editadd").show(); // Show the "editadd" icon
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
                // Click event handler for the "editadd" icon
                $(document).on("click", ".add-upd", function() {
                    console.log("Editadd icon clicked");
                    var row = $(this).closest("tr");
                    var propId = $(this).data("edit-id");
                    console.log(propId);
                    var rowData = {
                        prop_id: propId,
                    };
                    // Collect the updated data from the row
                    row.find('input[type="date"], textarea, input[type="text"]').each(function() {
                        var fieldName = $(this).attr("name");
                        var value = $(this).val();
                        rowData[fieldName] = value;
                    });

                    // Set the ID value if available
                    if (propId) {
                        rowData.id = propId;
                    }

                    // Perform an AJAX request to update the data on the server
                    $.ajax({
                        type: "POST",
                        url: "/update-slc-data/" + propId, // Use editId in the URL
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

                    // Hide the "editadd" icon and show the "edit" icon
                    $(this).hide();
                    $(this).siblings(".edit").show();
                });
            });
        </script>

        <script>
            $(document).ready(function() {
            var csrfToken = "{{ csrf_token() }}";

                // Click event handler for the "edit" icon
                $(document).on("click", ".edit", function() {
                    console.log("Edit icon clicked");
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-seplc");
                    var clickedEdit = $(this); // Store reference to the clicked element

                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-slc/" + editId,
                            success: function(response) {
                                var rowData = response;
                                row.find("td:not(:last-child)").each(function() {
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

                                clickedEdit.hide(); // Hide the clicked "edit" icon
                                clickedEdit.siblings(".editadd").show(); // Show the "editadd" icon
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
                // Click event handler for the "editadd" icon
                $(document).on("click", ".editadd", function() {
                    console.log("Editadd icon clicked");
                    var row = $(this).closest("tr");
                    var propId = $(this).data("edit-add-propid");
                    console.log(propId);
                    var rowData = {
                        prop_id: propId,
                    };

                     // Add the value of uacs_obj_code input field to rowData
                     var itemcode = $('input[name="itemcode"]').val();
                    rowData["itemcode"] = itemcode;
                    console.log(itemcode);


                    // Collect the updated data from the row
                    row.find('input[type="date"], textarea, input[type="text"]').each(function() {
                        var fieldName = $(this).attr("name");
                        var value = $(this).val();
                        rowData[fieldName] = value;
                    });

                    // Set the ID value if available
                    if (propId) {
                        rowData.id = propId;
                    }

                    // Perform an AJAX request to update the data on the server
                    $.ajax({
                        type: "POST",
                        url: "/update-slc/" + propId, // Use editId in the URL
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

                    // Hide the "editadd" icon and show the "edit" icon
                    $(this).hide();
                    $(this).siblings(".edit").show();
                });
            });
        </script>



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
