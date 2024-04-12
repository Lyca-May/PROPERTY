<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES</title>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
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
                        <div>Property Cards | Overview</div>
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
                                                <a href="{{ url('/property-card-form') }}" class="card">
                                                    <div class="card-body text-center" style="font-size: 20px">+ Add new
                                                        property card
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


                                    <div class="row card-row">
                                        @foreach ($prop_card as $prop_cards)
                                            <div class="col-lg-3 col-md-6 col-sm-12 mb-12">
                                                <!-- Modal trigger element -->
                                                <a class="card2" href="#" data-toggle="modal"
                                                    data-target="#editItemModal{{ $prop_cards->id }}">
                                                    <div class="card-body">
                                                        <h3 class="card-title">ENTITY NAME:
                                                            {{ $prop_cards->entity_name }}
                                                        </h3>
                                                        <h3 class="card-title">FUND CLUSTERE:
                                                            {{ $prop_cards->fund_cluster }}
                                                        </h3>
                                                        <h3 class="card-text small">NAME:
                                                            {{ $prop_cards->prop_plant_eq }}
                                                        </h3>
                                                        <p class="card-text small">Property No/Object Account Code:
                                                            {{ $prop_cards->prop_no }}
                                                        </p>
                                                    </div>
                                                    <div class="go-corner" href="#">
                                                        <div class="go-arrow">
                                                            →
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="modal fade" id="editItemModal{{ $prop_cards->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-custom-width" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editItemModalLabel">View or
                                                                Edit
                                                                Property Card</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('/edit-property-card/' . $prop_cards->id) }}"
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
                                                                                    <label
                                                                                        class="col-md-6 col-form-label">
                                                                                        Fund Cluster
                                                                                    </label>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text"
                                                                                            name="fund_cluster"
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
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            class="col-form-label"><b>Property,
                                                                                                Plant &
                                                                                                Equipment:</b></label>
                                                                                        <input type="text"
                                                                                            name="prop_plant_eq"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $prop_cards->prop_plant_eq }}">
                                                                                        @error('prop_plant_eq')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            class="col-form-label"><b>Property
                                                                                                Number:</b></label>
                                                                                        <input type="text"
                                                                                            name="prop_no"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $prop_cards->prop_no }}">
                                                                                        @error('prop_no')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            class="col-form-label"><b>Description:</b></label>
                                                                                        <input type="text"
                                                                                            name="description"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $prop_cards->description }}">
                                                                                        @error('description')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

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
                                                                                                    colspan="5"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE/TRANSFER/DISPOSAL
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="1"
                                                                                                    style="text-align: center;">
                                                                                                    BALANCE
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="2"
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
                                                                                                    OFFICE
                                                                                                    OFFICER</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    TRASNFER</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    DISPOSAL</th>
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
                                                                                                    @php
                                                                                                    $formattedDate = date('d/m/y', strtotime($prop_cards->date));
                                                                                                @endphp
                                                                                                    <input
                                                                                                        type="date"
                                                                                                        name="date"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $formattedDate }}">
                                                                                                    @error('date')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="reference" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="@error('reference') {{ $message }} @enderror">{{ $prop_cards->reference }}</textarea>
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
                                                                                                        value="{{ $prop_cards->receipt_qty }}"
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
                                                                                                        value="{{ $prop_cards->receipt_unitcost }}"
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
                                                                                                        value="{{ $prop_cards->receipt_totalcost }}"
                                                                                                        readonly>
                                                                                                    @error('receipt_totalcost')
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
                                                                                                        value="">
                                                                                                    @error('issue_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_office_officer"
                                                                                                        id="issue_office_officer"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="">
                                                                                                    @error('issue_office_officer')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <div
                                                                                                    style="text-align: center;">
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="issue"
                                                                                                            id="issue_office_officer1"
                                                                                                            value="issue">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="transfer"
                                                                                                            id="issue_office_officer2"
                                                                                                            value="tra">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="disposal"
                                                                                                            id="issue_office_officer3"
                                                                                                            value="value3">
                                                                                                    </td>
                                                                                                </div>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="bal_qty"
                                                                                                        id=""
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="">
                                                                                                    @error('bal_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="repair_amount"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="">
                                                                                                    @error('repair_amount')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>

                                                                                                <td>
                                                                                                    <textarea type="text" name="remarks" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea>
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
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE254;</i></a>
                                                                                                    <a class="delete"
                                                                                                        title="Delete"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE872;</i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            @foreach ($prop_ext->where('prop_id', $prop_cards->id) as $data)
                                                                                            <tr>
                                                                                                    <td><input type="date" value="{{$data->date}}" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td><textarea type="text" name="reference"  class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{$data->reference}}</textarea></td>
                                                                                                    <td><input type="text" name="receipt_qty" value="{{ $data->receipt_qty }}" class="form-control text-line receipt-input" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td><input type="text" name="receipt_unitcost" value="{{ $data->receipt_unitcost }}" class="form-control text-line receipt-input" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td><input type="text" name="receipt_totalcost" value="{{ $data->receipt_totalcost }}" class="form-control text-line receipt-total" style="padding-top: 4px; padding-bottom: 4px;" ></td>
                                                                                                    <td><input type="text" name="issue_qty" value="{{$data->issue_qty}}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td><input type="text" name="office_officer" value="{{$data->office_officer}}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td>
                                                                                                        <input type="checkbox" name="issue_transfer_disposal" value="ISSUE" {{ $data->issue_transfer_disposal == "ISSUE" ? 'checked' : '' }}>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="checkbox" name="issue_transfer_disposal" value="TRANSFER" {{ $data->issue_transfer_disposal == "TRANSFER" ? 'checked' : '' }}>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="checkbox" name="issue_transfer_disposal" value="DISPOSAL" {{ $data->issue_transfer_disposal == "DISPOSAL" ? 'checked' : '' }}>
                                                                                                    </td>
                                                                                                    <td><input type="text" name="bal_qty" value="{{$data->bal_qty}}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td><input type="text" name="bal_amount" value="{{$data->bal_amount}}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td><input type="text" name="remarks" value="{{$data->remarks}}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>
                                                                                                    <td>
                                                                                                        <a class="add"
                                                                                                            title="Add"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE03B;</i></a>
                                                                                                        <a class="edit"
                                                                                                            title="Edit"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE254;</i></a>
                                                                                                        <a class="delete"
                                                                                                            title="Delete"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE872;</i></a>
                                                                                                    </td>
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
                                                            </form>
                                                            <button type="button" data-prop-id="{{ $prop_cards->id }} " class="btn btn-info add-new"><i
                                                                    class="fa fa-plus" ></i> Add New</button>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <script>
                                                function navigateToPrintablePage() {
                                                    var prop_cards_id = '{{ $prop_cards->id }}';
                                                    window.location.href = '/printable-prop-page/' + prop_cards_id;
                                                }
                                            </script>
                                         
                                        @endforeach
                                        <script>
                                            var csrfToken = "{{ csrf_token() }}";
                                        </script>
                                        <script>
                                            $(document).ready(function() {
                                               $('[data-toggle="tooltip"]').tooltip();
                                               var actions = $("table td:last-child").html();

                                               // Append table with add row form on add new button click
                                               $(".add-new").click(function() {
                                                   $(this).attr("disabled", "disabled");
                                                   var index = $("table tbody tr:last-child").index();
                                                   var propId = $(this).data("prop-id");
                                                   var row = '<tr>' +
                                                       '<td><input type="date" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                       '<td><textarea type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea></td>' +
                                                       '<td><input type="text" name="receipt_qty" value="{{ $prop_cards->receipt_qty }}" class="form-control text-line receipt-input" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                       '<td><input type="text" name="receipt_unitcost" value="{{ $prop_cards->receipt_unitcost }}" class="form-control text-line receipt-input" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                       '<td><input type="text" name="receipt_totalcost" value="{{ $prop_cards->receipt_totalcost }}" class="form-control text-line receipt-total" style="padding-top: 4px; padding-bottom: 4px;" ></td>' +
                                                       '<td><input type="text" name="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                       '<td><input type="text" name="office_officer" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                       '<td>' +
                                                       '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="ISSUE">' +
                                                       '</td>' +
                                                       '<td>' +
                                                       '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="TRANSFER">' +
                                                       '</td>' +
                                                       '<td>' +
                                                       '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal" value="DISPOSAL">' +
                                                       '</td>' +
                                                       '</div>' +
                                                       '<td><input type="text" name="bal_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;"></td>' +
                                                       '<td><input type="text" name="bal_amount" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                       '<td><textarea type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea></td>' +
                                                       '<td>' + actions + '</td>' +
                                                       '<td><input type="text" name="prop_id" value="' + propId + '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                    //    '<td><input type="text" name="prop_id" value="{{ $prop_cards->id }}" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                                                       '</tr>';
                                                       $("table tbody").append(row);
                                                       // Show "Add" icon for the newly added row
                                                       $("table tbody tr:last-child").find(".add").show();
                                                       $("table tbody tr:last-child").find(".edit").hide();
                                                       $('[data-toggle="tooltip"]').tooltip();
                                               });

                                               $(document).on("click", ".add", function() {
                                                   var rowData = {};
                                                   var input = $(this).parents("tr").find(
                                                       'input[type="text"], input[type="date"], textarea, input[type="checkbox"]');
                                                   input.each(function() {
                                                       var name = $(this).attr("name");
                                                       var value = $(this).val();
                                                       if ($(this).attr('type') === 'checkbox') {
                                                           if ($(this).is(':checked')) {
                                                               value = 'ISSUE';
                                                           } else if ($(this).prop('checked')) {
                                                               value = 'TRANSFER';
                                                           } else {
                                                               value = 'DISPOSAL';
                                                           }
                                                       }

                                                       rowData[name] = value;
                                                   });

                                                   $.ajax({
                                                       type: 'POST',
                                                       url: '/add-prop-extension',
                                                       headers: {
                                                           'X-CSRF-TOKEN': csrfToken
                                                       },
                                                       data: rowData,
                                                       success: function(response) {
                                                           // Update table with new row data
                                                           var newRow = '<tr>';
                                                           Object.values(rowData).forEach(function(value) {
                                                               newRow += '<td>' + value + '</td>';
                                                           });
                                                           newRow += '<td>' + actions + '</td></tr>';
                                                           $("table tbody").append(newRow);
                                                       },
                                                       error: function(xhr, status, error) {
                                                           // Handle error
                                                           console.error(xhr.responseText);
                                                       }
                                                   });

                                                   $(this).parents("tr").find(".add, .edit").toggle();
                                                   $(".add-new").removeAttr("disabled", "disabled");
                                               });



                                               // Edit row on edit button click
                                               $(document).on("click", ".edit", function() {
                                                   $(this).parents("tr").find("td:not(:last-child)").each(function() {
                                                       if ($(this).find('input[type="checkbox"]').length > 0) {
                                                           var checkboxes = [];
                                                           $(this).find('input[type="checkbox"]').each(function() {
                                                               checkboxes.push($(this).prop('checked'));
                                                           });
                                                           $(this).html('');
                                                           checkboxes.forEach(function(checked) {
                                                               var checkbox = checked ? 'checked' : '';
                                                               $(this).append('<input type="checkbox" ' + checkbox + '>');
                                                           });
                                                       } else {
                                                           $(this).html('<input type="text" class="form-control" value="' + $(this)
                                                               .text() + '">');
                                                       }
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








        {{-- SCRIPTS --}}
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
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('
                                                                                                                                                                                                    success ') }}',
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
                    text: '{{ session('
                                                                                                                                                                                                    failed ') }}',
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
            document.addEventListener('DOMContentLoaded', function() {
                const tables = document.querySelectorAll('.table-resizable');

                tables.forEach(table => {
                    let ths = table.querySelectorAll('th');
                    let startX, startWidth;

                    ths.forEach(th => {
                        th.addEventListener('mousedown', function(event) {
                            startX = event.pageX;
                            startWidth = th.offsetWidth;

                            document.addEventListener('mousemove', onMouseMove);
                            document.addEventListener('mouseup', () => {
                                document.removeEventListener('mousemove', onMouseMove);
                            });
                        });

                        function onMouseMove(event) {
                            const diffX = event.pageX - startX;
                            th.style.width = startWidth + diffX + 'px';
                        }
                    });
                });
            });
        </script>
        @include('footer')


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </div>
    </div>
</body>

</html>
