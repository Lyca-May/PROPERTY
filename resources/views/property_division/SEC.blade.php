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

        .centered-card {
            margin: 0 auto;
            max-width: 200%;
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
                        <div>Semi - Expandable Property Cards | Overview</div>
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
                                                <a href="{{ url('/sec-form') }}" class="card">
                                                    <div class="card-body text-center" style="font-size: 20px">+ Add new
                                                       Semi-Expandable Property Card
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

                                    <div class="centered-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Entity Name</th>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Semi-Expendable Property Number</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sep_card as $sep_cards)
                                                                <tr>
                                                                    <td>{{ $sep_cards->entity_name }}</td>
                                                                    <td>{{ $sep_cards->sep_name }}</td>
                                                                    <td>{{ $sep_cards->desc }}</td>
                                                                    <td>{{ $sep_cards->sep_no }}</td>
                                                                    <td>
                                                                        <!-- View icon to trigger modal -->
                                                                        <a href="#" class="view-icon"
                                                                            data-toggle="modal"
                                                                            data-target="#editItemModal{{ $sep_cards->id }}">
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
                                    <div class="row card-row">
                                        @foreach ($sep_card as $sep)
                                            <div class="modal fade" id="editItemModal{{ $sep->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-custom-width" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editItemModalLabel">View or Edit
                                                                Semi-Expendable Property Card</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ url('/edit-sep-card/' . $sep->id) }}"
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
                                                                                            value="{{ $sep->entity_name }}" readonly>
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
                                                                                            value="{{ $sep->fund_cluster }}" readonly>
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
                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            class="col-form-label"><b>
                                                                                                Semi-Expendable
                                                                                                Property:</b></label>
                                                                                        <input type="text"
                                                                                            name="prop_plant_eq"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->sep_name }}" readonly>
                                                                                        @error('prop_plant_eq')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            class="col-form-label"><b>Description:</b></label>
                                                                                        <input type="text"
                                                                                            name="desc"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->desc }}" readonly>
                                                                                        @error('desc')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            class="col-form-label"><b>
                                                                                                Semi-Expendable Property
                                                                                                Number:</b></label>
                                                                                        <input type="text"
                                                                                            name="prop_no"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->sep_no }}" readonly>
                                                                                        @error('prop_no')
                                                                                            <span
                                                                                                class=" text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table
                                                                                        class="table table-bordered table-resizable"
                                                                                        style="font-size: 10px">
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
                                                                                                    colspan=""
                                                                                                    style="text-align: center;">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="4"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE/TRANSFER/DISPOSAL
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="1"
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
                                                                                                    ITEM NO.
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    QTY
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                style="text-align: center;">
                                                                                                CATEGORY
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    FROM WHO?
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    OFFICE
                                                                                                    OFFICER</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    QTY
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    AMOUNT</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    REMARKS
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ACTION
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="date"
                                                                                                        name="date"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->date }}">
                                                                                                    @error('date')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="ref" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="@error('ref') {{ $message }} @enderror">{{ $sep->ref }}</textarea>
                                                                                                    @error('ref')
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
                                                                                                        value="{{ $sep->receipt_qty }}"
                                                                                                        placeholder="">
                                                                                                    @error('receipt_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="number"
                                                                                                        name="receipt_unitcost"
                                                                                                        id="receipt_unitcost"
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $sep->receipt_unitcost }}"
                                                                                                        placeholder="">
                                                                                                    @error('receipt_unitcost')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="number"
                                                                                                        name="receipt_totalcost"
                                                                                                        id="receipt_totalcost"
                                                                                                        class="form-control text-line receipt-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $sep->receipt_totalcost }}"
                                                                                                        readonly>
                                                                                                    @error('receipt_totalcost')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea
                                                                                                        type="text"
                                                                                                        name="item_no"
                                                                                                        id="item_no"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->item_no }}">{{ $sep->item_no }}</textarea>
                                                                                                    @error('item_no')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_qty"
                                                                                                        id="issue_qty"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->issue_qty }}" hidden>
                                                                                                    @error('issue_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="transfer_from"
                                                                                                        id="issue_qty"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->transfer_from }}" hidden>
                                                                                                    @error('issue_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="office_officer"
                                                                                                        id=""
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->office_officer }}" hidden>
                                                                                                    @error('office_officer')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_transfer_disposal"
                                                                                                        id=""
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->issue_transfer_disposal }}" hidden>
                                                                                                    @error('office_officer')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="bal_qty"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->bal_qty }}"
                                                                                                         hidden>
                                                                                                    @error('bal_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="number" step="0.01" min="0" max="100"
                                                                                                        name="bal_amount"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="" hidden
                                                                                                        value="{{ $sep->bal_amount }}">
                                                                                                    @error('bal_amount')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="remarks" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="" hidden>{{ $sep->remarks }}</textarea>
                                                                                                    @error('remarks')
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
                                                                                                </td>
                                                                                            </tr>
                                                                                            @foreach ($semi_ext->where('semi_id', $sep->id) as $data)
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
                                                                                                        placeholder=""
                                                                                                        hidden>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="hidden"
                                                                                                        name="receipt_unitcost"
                                                                                                        value=""
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        id="receipt-unitost"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        hidden>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="hidden"
                                                                                                        name="receipt_totalcost"
                                                                                                        value=""
                                                                                                        class="form-control text-line receipt-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" hidden>
                                                                                                </td>
                                                                                                <td><input
                                                                                                    type="text"
                                                                                                    name="item_no"
                                                                                                    value="{{ $sep->item_no }}"
                                                                                                    class="form-control text-line"
                                                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                    placeholder="" >
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="issue_qty"
                                                                                                        value="{{ $data->issue_qty }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_transfer_disposal"
                                                                                                        value="{{ $data->issue_transfer_disposal }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        readonly>
                                                                                                </td>

                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="transfer_from"
                                                                                                        value="{{ $data->transfer_from }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        readonly>
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
                                                                                                        name="bal_qty"
                                                                                                        id="bal-qty {{ $data->id }} "
                                                                                                        value="{{ $data->bal_qty }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                    @if ($data->issue_transfer_disposal == 'TRANSFER' || $data->issue_transfer_disposal == 'RETURN') hidden @endif>

                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="bal_amount"
                                                                                                        value="{{ $data->bal_amount }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                    @if ($data->issue_transfer_disposal == 'TRANSFER' || $data->issue_transfer_disposal == 'RETURN') hidden @endif>

                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="remarks"
                                                                                                        value="{{ $data->remarks }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class="edit"
                                                                                                    title="Edit"
                                                                                                    data-edit-id="{{ $data->id }}"
                                                                                                    data-edit-id="{{ $sep->id }} "
                                                                                                    data-toggle="tooltip"><i
                                                                                                        class="material-icons">&#xE254;</i></a>
                                                                                                <a class="edit-add"
                                                                                                    title="Add"
                                                                                                    data-edit-add-propid="{{ $sep->id }} "
                                                                                                    data-edit-id="{{ $data->id }}"
                                                                                                    data-toggle="tooltip" hidden><i
                                                                                                        class="material-icons">&#xE03B;</i></a>
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

                                                                        {{-- <a type="button" class="btn btn-danger"
                                                                            href="{{ url('/view-seplc/' . $sep->id) }}">View
                                                                            SEP Ledger Card</a> --}}
                                                                            <button type="button"
                                                                            data-semi-id="{{ $sep->id }}"
                                                                            class="btn btn-info add-new"><i
                                                                                class="fa fa-plus"></i>
                                                                            Add New</button>
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">

                                                                        {{-- <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button> --}}
                                                                            <button type="button" onclick="navigateToPrintablePage('{{ $sep->id }}')" class="btn btn-success">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                                                                    <path d="M6 9V2H18V9"></path>
                                                                                    <path d="M18 14H20V20H4V14H6"></path>
                                                                                    <path d="M16 18H8"></path>
                                                                                    <path d="M16 12H8"></path>
                                                                                </svg>
                                                                            </button>

                                                                            <script>
                                                                                function navigateToPrintablePage(propId) {
                                                                                    window.location.href = '/printable-sepc-page/' + propId;
                                                                                }
                                                                            </script>



                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                // Select receipt input fields
                                                const receiptInputs = document.querySelectorAll('.receipt-input');

                                                // Add event listener for each receipt input field
                                                receiptInputs.forEach(input => {
                                                    input.addEventListener('input', updateReceiptTotalCost);
                                                });

                                                function updateReceiptTotalCost(event) {
                                                    // Get the parent row of the input field
                                                    const parentRow = event.target.closest('tr');

                                                    // Get the quantity and unit cost values within the parent row
                                                    const qty = parseFloat(parentRow.querySelector('[name="receipt_qty"]').value);
                                                    const unitCost = parseFloat(parentRow.querySelector('[name="receipt_unitcost"]').value);

                                                    // Calculate the total cost
                                                    const totalCost = qty * unitCost;

                                                    // Update the total cost field within the parent row with the calculated value
                                                    parentRow.querySelector('[name="receipt_totalcost"]').value = isNaN(totalCost) ? '' : totalCost.toFixed(2);
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
                   var semiId = $(this).data("semi-id");
                   var modal = $('#editItemModal' + semiId);
                   var table = modal.find('.table-bordered.table-resizable tbody');
                   var editId = $(this).data("edit-id");
                   var actions =
                       '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
                       '<a class="edit" title="Edit" data-edit-id="' + editId +
                       '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
                       '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

                       var row = $('<tr>').append(
                           $('<td>').append('<input  type="date" class="form-control text-line" name="date" style="padding-top: 4px; padding-bottom: 4px;" value="">'),
                           $('<td>').append('<input  type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'),
                           $('<td>').append('<input hidden type="text" class="form-control text-line receipt-input" name="" id="receipt_qtyy" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'),
                           $('<td>').append('<input hidden type="text" class="form-control text-line receipt-input" name="" id="receipt_unitcost" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'),
                           $('<td>').append('<input hidden type="text" class="form-control text-line receipt-total" name="" id="receipt_totalcost" style="padding-top: 4px; padding-bottom: 4px;" value="">'),
                           $('<td>').append('<input hidden type="text" class="form-control text-line" name="item_no" style="padding-top: 4px; padding-bottom: 4px;" value="">'),
                           $('<td>').append('<input type="text" class="form-control text-line" name="issue_qty" style="padding-top: 4px; padding-bottom: 4px;" value="">'),
                           $('<td>').append(
                                $('<select>', {
                                    'name': 'issue_transfer_disposal',
                                    'id': 'issue_transfer_disposal',
                                    'class': 'form-control text-line',
                                    'style': 'padding-top: 4px; padding-bottom: 4px;'
                                }).append(
                                    $('<option>', {
                                        value: '',
                                        text: 'Select'
                                    }),
                                    $('<option>', {
                                        value: 'ISSUE',
                                        text: 'Issue'
                                    }),
                                    $('<option>', {
                                        value: 'TRANSFER',
                                        text: 'Transfer'
                                    }),
                                    $('<option>', {
                                        value: 'RETURN',
                                        text: 'Return'
                                    })
                                )),
                                $('<td class="select">').append(
                                $('<select>').attr({
                                    'name': 'transfer_from',
                                    'id': 'transfer_from',
                                    'class': 'form-control text-line',
                                    'style': 'padding-top: 4px; padding-bottom: 4px;'
                                })
                            ),
                               $('<td>').append('<input type="text" class="form-control text-line" name="office_officer" style="padding-top: 4px; padding-bottom: 4px;" value="">'),
                           $('<td>').append('<input type="text" class="form-control text-line" name="bal_qty" style="padding-top: 4px; padding-bottom: 4px;" value="">'),
                           $('<td>').append('<input type="text" class="form-control text-line" name="bal_amount" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'),
                           $('<td>').append('<input type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'),
                           $('<td>').append(actions),
                           $('<td hidden>').append('<input type="text" name="semi_id" value="' + semiId + '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">')
                       );


                   $("table").append(row);
                   var rowCount = table.find("tr").length;
                   console.log("rowCount:", rowCount);

                   if (rowCount === 2) {
                            console.log("Two rows added.");
                            var $row = table.find("tr:last");
                            $row.find('select[name="transfer_from"]').val(0).hide();
                            calculateBalance();
                        } else if (rowCount > 2) {
                            console.log("more than 2 row added.");

                            function handleIssueTransferChange() {
                                var issueTransferValue = $(this).val();
                                var $row = $(this).closest("tr");

                                if (issueTransferValue === "TRANSFER") {
                                    $row.find('input[name="bal_qty"]').val(0).prop("hidden", true);
                                    $row.find('input[name="bal_amount"]').val(0).prop("hidden", true);
                                    $.ajax({
                                        url: '/get-semi-id',
                                        method: 'GET',
                                        data: {
                                            semiId: semiId
                                        },
                                        success: function(response) {
                                            $('td.select').empty();

                                            var selectDropdown = $('<select>').attr({
                                                'name': 'transfer_from',
                                                'id': 'transfer_from',
                                                'class': 'form-control text-line',
                                                'style': 'padding-top: 4px; padding-bottom: 4px;'
                                            });
                                            $.each(response, function(index, item) {
                                                selectDropdown.append($('<option>').attr('value', item)
                                                    .text(item));
                                            });
                                            $('td.select').append(selectDropdown);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Failed to fetch data:', error);
                                        }
                                    });
                                    $(document).on("input", 'input[name="issue_qty"]', function() {
                                        var $row = $(this).closest("tr");
                                        var issueQty = parseFloat($(this).val());
                                        var selectedOfficer = $row.find(
                                                'select[name="transfer_from"]')
                                            .val();
                                        console.log("the selected officer is " + selectedOfficer);
                                        var $matchingRow = $row.closest(".modal-body").find(
                                            'input[name="office_officer"]').filter(function() {
                                            return $(this).val() === selectedOfficer;
                                        }).closest("tr");

                                        if ($matchingRow.length) {
                                            var officeOfficer = $matchingRow.find(
                                                    'input[name="office_officer"]').val()
                                                .toString(); // Convert to string
                                            console.log("the matched office officer is " +
                                                officeOfficer);
                                            $.ajax({
                                                url: '/get-issue-qty/semicard',
                                                method: 'GET',
                                                data: {
                                                    officer: selectedOfficer
                                                },
                                                success: function(response) {
                                                    if (response.success) {
                                                        var officerIssueQty = response
                                                            .issue_qty;
                                                        console.log(officerIssueQty);
                                                        var newIssueQty = officerIssueQty -
                                                            issueQty;
                                                        console.log(newIssueQty);
                                                        $(document).trigger(
                                                            "issueQtyUpdated", [
                                                                newIssueQty,
                                                                selectedOfficer
                                                            ]);
                                                    } else {
                                                        console.error(
                                                            'Failed to fetch issue_qty for officer ' +
                                                            selectedOfficer);
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(
                                                        'Failed to fetch issue_qty for officer ' +
                                                        selectedOfficer + ': ' + error);
                                                }
                                            });
                                        } else {
                                            console.log("No matching office officer found.");
                                        }
                                    });
                                } else if (issueTransferValue === "ISSUE") {
                                    $row.find('#transfer_from').hide();
                                    $row.find('input[name="bal_qty"]').val(0).prop("hidden", false);
                                    $row.find('input[name="bal_amount"]').val(0).prop("hidden", false);
                                    console.log('ISSUE IS SELECTED');
                                    $(document).ready(function() {
                                        $(document).on("input", 'input[name="issue_qty"]', function() {
                                            var $row = $(this).closest("tr");
                                            var issueQty = $(this).val();
                                            console.log("the current issueqty is " + issueQty);
                                            var index = $row.index();
                                            if (index > 1 && index < $("table tbody tr").length) {
                                                $.ajax({
                                                    url: "/get-latest-issue",
                                                    method: "GET",
                                                    success: function(response) {
                                                        if (response.bal_qty) {
                                                            console.log('ISSUE HAS BEEN FOUND!');
                                                            var prevRowBalQty = parseFloat(response.bal_qty);
                                                            var unitCost = parseFloat($row.closest(".modal-body").find(
                                                                'input[name="receipt_unitcost"]').val()) || 0;
                                                            var issueQty = parseFloat($row.find('input[name="issue_qty"]').val());
                                                            var newBalQty = prevRowBalQty - issueQty;
                                                            var newBalAm = unitCost * newBalQty;
                                                            console.log(newBalQty, newBalAm);

                                                            $row.find('input[name="bal_qty"]').val(newBalQty);
                                                            $row.find('input[name="bal_amount"]').val(newBalAm.toFixed(2));
                                                        } else {
                                                            console.log("No previous row with ISSUE value found.");
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error("Error fetching latest issue row:", error);
                                                    }
                                                });
                                            }else{
                                                console.log("error");
                                            }
                                        });
                                    });
                                }
                                else if (issueTransferValue === "RETURN") {
                                    $row.find('input[name="bal_qty"]').val(0).prop("hidden", true);
                                    $row.find('input[name="bal_amount"]').val(0).prop("hidden", true);
                                    $.ajax({
                                        url: '/get-semi-id',
                                        method: 'GET',
                                        data: {
                                            semiId: semiId
                                        },
                                        success: function(response) {
                                            $('td.select').empty();

                                            var selectDropdown = $('<select>').attr({
                                                'name': 'transfer_from',
                                                'id': 'transfer_from',
                                                'class': 'form-control text-line',
                                                'style': 'padding-top: 4px; padding-bottom: 4px;'
                                            });
                                            $.each(response, function(index, item) {
                                                selectDropdown.append($('<option>').attr('value', item)
                                                    .text(item));
                                            });
                                            $('td.select').append(selectDropdown);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Failed to fetch data:', error);
                                        }
                                    });
                                    $(document).on("input", 'input[name="issue_qty"]', function() {
                                        var $row = $(this).closest("tr");
                                        var issueQty = parseFloat($(this).val());
                                        var selectedOfficer = $row.find(
                                                'select[name="transfer_from"]')
                                            .val();
                                        console.log("the selected officer is " + selectedOfficer);
                                        var $matchingRow = $row.closest(".modal-body").find(
                                            'input[name="office_officer"]').filter(function() {
                                            return $(this).val() === selectedOfficer;
                                        }).closest("tr");

                                        if ($matchingRow.length) {
                                            var officeOfficer = $matchingRow.find(
                                                    'input[name="office_officer"]').val()
                                                .toString(); // Convert to string
                                            console.log("the matched office officer is " +
                                                officeOfficer);
                                            $.ajax({
                                                url: '/get-issue-qty/semicard',
                                                method: 'GET',
                                                data: {
                                                    officer: selectedOfficer
                                                },
                                                success: function(response) {
                                                    if (response.success) {
                                                        var officerIssueQty = response
                                                            .issue_qty;
                                                        console.log(officerIssueQty);
                                                        var newIssueQty = officerIssueQty -
                                                            issueQty;
                                                        console.log(newIssueQty);
                                                        $(document).trigger(
                                                            "issueQtyUpdated", [
                                                                newIssueQty,
                                                                selectedOfficer
                                                            ]);
                                                    } else {
                                                        console.error(
                                                            'Failed to fetch issue_qty for officer ' +
                                                            selectedOfficer);
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(
                                                        'Failed to fetch issue_qty for officer ' +
                                                        selectedOfficer + ': ' + error);
                                                }
                                            });
                                        } else {
                                            console.log("No matching office officer found.");
                                        }
                                    });
                                }else{
                                    console.log('error');
                                }

                                if (issueTransferValue === "TRANSFER") {
                                    $row.find('#transfer_from').show();
                                } else if (issueTransferValue === "RETURN") {
                                    $row.find('#transfer_from').show();

                                }
                                else {
                                    $row.find('#transfer_from').hide();
                                    $row.find('select[name="transfer_from"]').val("");
                                }
                            }
                            // Add event listener for change event on select element with name 'issue_transfer_disposal'
                            $(document).on("change", 'select[name="issue_transfer_disposal"]',
                                handleIssueTransferChange);
                        }

                        $('table tbody tr:last select[name="issue_transfer_disposal"]').trigger("change");
                        $("table tbody tr:last-child").find(".add").show();
                        $("table tbody tr:last-child").find(".edit").hide();
                        $("table tbody tr:last-child").find(".edit-add").hide();
                        $('[data-toggle="tooltip"]').tooltip();
               });

                //CALCULATION FOT THE 2ND ROW
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

                $(document).on("issueQtyUpdated", function(event, newIssueQty, selectedOfficer) {
                    $(document).on("click", ".add", function() {
                        console.log("ADD BUTTON CLICKED");
                        var rowData = {};
                        var input = $(this).parents("tr").find(
                            'input[type="text"], input[type="date"], textarea, select');
                        input.each(function() {
                            var name = $(this).attr("name");
                            var value = $(this).val();
                            rowData[name] = value;
                        });
                        $.ajax({
                            type: "POST",
                            url: "/add-semi-extension",
                            headers: {
                                "X-CSRF-TOKEN": csrfToken,
                            },
                            data: JSON.stringify({
                                ...rowData,
                                officer: selectedOfficer,
                                newIssueQty: newIssueQty
                            }),
                            contentType: "application/json",
                            success: function(response) {
                                var newRow = "<tr>";
                                Object.values(rowData).forEach(function(value) {
                                    newRow += "<td>" + value + "</td>";
                                });
                                newRow += "<td>" + actions + "</td></tr>";
                                $("table tbody").append(newRow);
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error(xhr.responseText);
                            },
                        });

                        $(this).parents("tr").find(".add, .edit").toggle();
                        $(".add-new").removeAttr("disabled");
                        $(".edit-add").removeAttr("disabled");
                    });
                });

                //FOR DISPOSED
                $(document).on("disposedQtyUpdated", function(event, newDisposalQty, selectedOfficer) {
                    $(document).on("click", ".add", function() {
                        console.log("ADD BUTTON CLICKED");
                        var rowData = {};
                        var input = $(this).parents("tr").find(
                            'input[type="text"], input[type="date"], textarea, select');
                        input.each(function() {
                            var name = $(this).attr("name");
                            var value = $(this).val();
                            rowData[name] = value;
                        });
                        $.ajax({
                            type: "POST",
                            url: "/add-semi-extension",
                            headers: {
                                "X-CSRF-TOKEN": csrfToken,
                            },
                            data: JSON.stringify({
                                ...rowData,
                                officer: selectedOfficer,
                                newIssueQty: newDisposalQty
                            }),
                            contentType: "application/json",
                            success: function(response) {
                                var newRow = "<tr>";
                                Object.values(rowData).forEach(function(value) {
                                    newRow += "<td>" + value + "</td>";
                                });
                                newRow += "<td>" + actions + "</td></tr>";
                                $("table tbody").append(newRow);
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error(xhr.responseText);
                            },
                        });

                        $(this).parents("tr").find(".add, .edit").toggle();
                        $(".add-new").removeAttr("disabled");
                        $(".edit-add").removeAttr("disabled");
                    });
                });
                $(document).on("click", ".add", function() {
                    var rowData = {};
                    var input = $(this).parents("tr").find(
                        'input[type="text"], input[type="date"], textarea, select');
                    input.each(function() {
                        var name = $(this).attr("name");
                        var value = $(this).val();
                        rowData[name] = value;
                    });

                    $.ajax({
                        type: "POST",
                        url: "/add-semi-extension",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        data: rowData,
                        success: function(response) {
                            // Update table with new row data
                            var newRow = "<tr>";
                            Object.values(rowData).forEach(function(value) {
                                newRow += "<td>" + value + "</td>";
                            });
                            newRow += "<td>" + actions + "</td></tr>";
                            $("table tbody").append(newRow);
                            $(this).parents("tr").find(".add, .edit").toggle();
                            $("table tbody tr:last-child").find(".edit-add").hide();
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        },
                    });


                    $(".add-new").removeAttr("disabled", "disabled");
                });
                $(document).on("click", ".edit", function() {
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-id");

                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-semi-ext-data/" + editId,
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

                                // Show the save button and hide the edit button
                                row.find(".edit-add").show();
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

                $(document).on("click", ".edit-add", function() {
                    var row = $(this).closest("tr");
                    var propId = $(this).data("edit-add-propid");
                    var editId = $(this).data("edit-id");
                    var rowData = {
                        prop_id: propId,
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
                        url: "/update-semi-ext-data/" + editId, // Use editId in the URL
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
           });
       </script>

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


        @include('footer')
    </div>
</body>

</html>
