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
                                                                                                    colspan="4"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE/TRANSFER/DISPOSAL
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="2"
                                                                                                    style="text-align: center;">
                                                                                                    BALANCE
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="1"
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
                                                                                                    CATEGORY</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    OFFICE
                                                                                                    OFFICER</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    FROM WHO?
                                                                                                </th>
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
                                                                                                        $formattedDate = date(
                                                                                                            'd/m/y',
                                                                                                            strtotime(
                                                                                                                $prop_cards->date,
                                                                                                            ),
                                                                                                        );
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
                                                                                                        id="receipt-qty{{ $prop_cards->id }}"
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
                                                                                                        id="receipt-unitcost{{ $prop_cards->id }}"
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
                                                                                                        value=""
                                                                                                        hidden>
                                                                                                    @error('issue_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="transfer_dropdown"
                                                                                                        id="transfer_dropdown"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value=""
                                                                                                        hidden>
                                                                                                    @error('transfer_dropdown')
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
                                                                                                        value=""
                                                                                                        hidden>
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
                                                                                                            value=""
                                                                                                            hidden>
                                                                                                    </td>
                                                                                                </div>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="hidden"
                                                                                                        name="bal_qty"
                                                                                                        id=""
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value=""
                                                                                                        hidden>
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
                                                                                                        value=""
                                                                                                        hidden>
                                                                                                    @error('repair_amount')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>

                                                                                                <td>
                                                                                                    <textarea type="text" name="remarks" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="" hidden></textarea>
                                                                                                    @error('remarks')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class="add"
                                                                                                        title="Add"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons"
                                                                                                            hidden>&#xE03B;</i></a>
                                                                                                    <a class="edit"
                                                                                                        title="Edit"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons"
                                                                                                            hidden>&#xE254;</i></a>
                                                                                                    <a class="delete"
                                                                                                        title="Delete"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons"
                                                                                                            hidden>&#xE872;</i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            @foreach ($prop_ext->where('prop_id', $prop_cards->id) as $data)
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
                                                                                                            value="{{ $data->receipt_qty }}"
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-qty"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="hidden"
                                                                                                            name="receipt_unitcost"
                                                                                                            value="{{ $data->receipt_unitcost }}"
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-unitost"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="hidden"
                                                                                                            name="receipt_totalcost"
                                                                                                            value="{{ $data->receipt_totalcost }}"
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
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="issue_transfer_disposal"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder=""
                                                                                                            value="{{ $data->issue_transfer_disposal }}">
                                                                                                    </td>

                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="office_officer"
                                                                                                            value="{{ $data->office_officer }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="transfer_dropdown"
                                                                                                            value="{{ $data->transfer_dropdown }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder=""
                                                                                                            readonly>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="bal_qty">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="new_bal_qty"
                                                                                                            id="bal-qty{{ $data->id }}"
                                                                                                            value="{{ $data->new_bal_qty }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            @if ($data->issue_transfer_disposal == 'TRANSFER' || $data->issue_transfer_disposal == 'DISPOSAL') hidden @endif>
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="bal_amount"
                                                                                                            value="{{ $data->bal_amount }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            @if ($data->issue_transfer_disposal == 'TRANSFER' || $data->issue_transfer_disposal == 'DISPOSAL') hidden @endif>
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
                                                                                                        {{-- <a class="add"
                                                                                                            title="Add"
                                                                                                            data-edit-add-propid="{{ $prop_cards->id }} "
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE03B;</i></a> --}}
                                                                                                        <a class="edit"
                                                                                                            title="Edit"
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-edit-id="{{ $prop_cards->id }} "
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE254;</i></a>
                                                                                                        <a class="edit-add"
                                                                                                            title="Add"
                                                                                                            data-edit-add-propid="{{ $prop_cards->id }} "
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-toggle="tooltip" hidden><i
                                                                                                                class="material-icons">&#xE03B;</i></a>
                                                                                                        {{-- <a class="delete"
                                                                                                            title="Delete"
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-toggle="tooltip"><i
                                                                                                                class="material-icons">&#xE872;</i></a> --}}
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
                                                            </form>
                                                            <button type="button"
                                                                data-prop-id="{{ $prop_cards->id }}"
                                                                class="btn btn-info add-new"><i
                                                                    class="fa fa-plus"></i> Add New</button>
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
        @include('footer')

        {{-- SCRIPTS --}}

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
        <script src="{{ asset('assets/js/property.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            const receiptInputs = document.querySelectorAll(".receipt-input");
            receiptInputs.forEach((input) => {
                input.addEventListener("input", updateReceiptTotalCost);
            });

            function updateReceiptTotalCost(event) {
                const parentRow = event.target.closest("tr");
                const qty = parseFloat(
                    parentRow.querySelector('[name="receipt_qty"]').value
                );
                const unitCost = parseFloat(
                    parentRow.querySelector('[name="receipt_unitcost"]').value
                );
                const totalCost = qty * unitCost;
                parentRow.querySelector('[name="receipt_totalcost"]').value = isNaN(
                        totalCost
                    ) ?
                    "" :
                    totalCost.toFixed(2);
            }

            $(document).ready(function() {
                $("#search-input").on("keyup", function() {
                    var searchText = $(this).val().toLowerCase();
                    $(".card-row .card2").each(function() {
                        var entityName = $(this)
                            .find(".card-title:first")
                            .text()
                            .toLowerCase();
                        var fundCluster = $(this)
                            .find(".card-title:nth-child(2)")
                            .text()
                            .toLowerCase();
                        var itemName = $(this).find(".card-text").text().toLowerCase();
                        if (
                            entityName.indexOf(searchText) === -1 &&
                            fundCluster.indexOf(searchText) === -1 &&
                            itemName.indexOf(searchText) === -1
                        ) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                const tables = document.querySelectorAll(".table-resizable");

                tables.forEach((table) => {
                    let ths = table.querySelectorAll("th");
                    let startX, startWidth;

                    ths.forEach((th) => {
                        th.addEventListener("mousedown", function(event) {
                            startX = event.pageX;
                            startWidth = th.offsetWidth;

                            document.addEventListener("mousemove", onMouseMove);
                            document.addEventListener("mouseup", () => {
                                document.removeEventListener("mousemove", onMouseMove);
                            });
                        });

                        function onMouseMove(event) {
                            const diffX = event.pageX - startX;
                            th.style.width = startWidth + diffX + "px";
                        }
                    });
                });
            });
        </script>
        <script>
            var csrfToken = "{{ csrf_token() }}";
            $(document).ready(function() {

                $('[data-toggle="tooltip"]').tooltip();

                $(".add-new").click(function(event) {
                    try {
                        event.preventDefault(); // Prevent default behavior of button (e.g., form submission)
                        $(this).attr("disabled", "disabled");
                        $(this).attr("disabled", "disabled");
                        var propId = $(this).data("prop-id");
                        console.log(propId);
                        var modal = $('#editItemModal' + propId); // Find the modal with the specific propID
                        var table = modal.find(
                            '.table-bordered.table-resizable tbody'); // Find the table within the modal
                        var editId = $(this).data("edit-id");
                        var actions =
                            '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
                            '<a class="edit-add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
                            '<a class="edit" title="Edit" data-edit-id="' +
                            editId +
                            '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
                            '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';

                        var row = $("<tr>").append(
                            $('<td>').append(
                                '<input type="date" name="date" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                            $('<td>').append(
                                '<textarea type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea>'
                            ),
                            $('<td>').append(
                                '<input type="hidden" name="receipt_qty" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                            $('<td>').append(
                                '<input type="hidden" name="receipt_unitcost" value="0" class="form-control text-line receipt-input1" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                            $('<td>').append(
                                '<input type="hidden" name="receipt_totalcost" value="0" class="form-control text-line receipt-total" style="padding-top: 4px; padding-bottom: 4px;" >'
                            ),
                            $('<td>').append(
                                '<input type="text" name="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                            $('<td>').append(
                                $('<select>', {
                                    'name': 'issue_transfer_disposal',
                                    'id': 'issue_transfer_disposal',
                                    'class': 'form-control text-line',
                                    'style': 'padding-top: 4px; padding-bottom: 4px;'
                                }).append(
                                    $('<option>', {
                                        value: 'ISSUE',
                                        text: 'Issue'
                                    }),
                                    $('<option>', {
                                        value: 'TRANSFER',
                                        text: 'Transfer'
                                    }),
                                    $('<option>', {
                                        value: 'DISPOSAL',
                                        text: 'Disposal'
                                    })
                                )),
                            $('<td>').append(
                                '<input type="text" name="office_officer" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                            $('<td class="select">').append(
                                $('<select>').attr({
                                    'name': 'transfer_dropdown',
                                    'id': 'transfer_dropdown',
                                    'class': 'form-control text-line',
                                    'style': 'padding-top: 4px; padding-bottom: 4px;'
                                })
                            ),
                            $('<td>').append(
                                '<input type="text" name="new_bal_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;">'
                            ),
                            $('<td>').append(
                                '<input type="text" name="bal_amount" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                            $('<td>').append(
                                '<textarea type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></textarea>'
                            ),
                            $('<td>').append(actions),
                            $('<td hidden>').append('<input type="text" name="prop_id" value="' + propId +
                                '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                        );

                        table.append(row); // Append the row to the table within the modal
                        var rowCount = table.find("tr").length; // Count the number of rows in the table
                        console.log("rowCount:", rowCount);
                        if (rowCount === 2) {
                            console.log("Two rows added.");

                            // Find the newly added row
                            var $row = table.find("tr:last");

                            // Hide the new_bal_qty and bal_amount inputs
                            $row.find('select[name="transfer_dropdown"]').val(0).hide();

                            // Call the calculateBalance function
                            calculateBalance();
                        } else if (rowCount > 2) {
                            console.log("more than 2 row added.");

                            function handleIssueTransferChange() {
                                var issueTransferValue = $(this).val();
                                var $row = $(this).closest("tr");

                                if (issueTransferValue === "TRANSFER") {
                                    $row.find('input[name="new_bal_qty"]').val(0).prop("hidden", true);
                                    $row.find('input[name="bal_amount"]').val(0).prop("hidden", true);
                                    $.ajax({
                                        url: '/get-prop-id',
                                        method: 'GET',
                                        data: {
                                            propId: propId
                                        },
                                        success: function(response) {
                                            // Clear existing select dropdowns with class "select"
                                            $('td.select').empty();

                                            var selectDropdown = $('<select>').attr({
                                                'name': 'transfer_dropdown',
                                                'id': 'transfer_dropdown',
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
                                                'select[name="transfer_dropdown"]')
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
                                                url: '/get-issue-qty/propertycard',
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
                                    $row.find('#transfer_dropdown').hide();
                                    $row.find('input[name="new_bal_qty"]').val(0).prop("hidden", false);
                                    $row.find('input[name="bal_amount"]').val(0).prop("hidden", false);
                                    calculateNewBalQty();
                                } else if (issueTransferValue === "DISPOSAL") {
                                    $row.find('input[name="new_bal_qty"]').val(0).prop("hidden", true);
                                    $row.find('input[name="bal_amount"]').val(0).prop("hidden", true);
                                    $row.find('select[name="transfer_dropdown"]').val(0).prop("hidden", true);
                                     $(document).on("input", 'input[name="office_officer"]', function() {
                                        var $row = $(this).closest("tr");
                                        var selectedOfficer = $(this).val();
                                        console.log("the selected officer is " + selectedOfficer);

                                        $row.find('input[name="issue_qty"]').on("input", function() {
                                            var issueQty = $(this).val();
                                            console.log("THIS IS THE ISSUEQTY " + issueQty);
                                            var $matchingRow = $row.closest(".modal-body").find(
                                            'input[name="office_officer"]').filter(function() {
                                            return $(this).val() === selectedOfficer;
                                        }).closest("tr");

                                        if ($matchingRow.length) {
                                            var officeOfficer = $matchingRow.find(
                                                    'input[name="office_officer"]').val()
                                                .toString(); // Convert to string
                                            console.log("the matched office officer is " + officeOfficer);
                                            $.ajax({
                                                url: '/get-disposal-issue-qty',
                                                method: 'GET',
                                                data: {
                                                    officer: selectedOfficer
                                                },
                                                success: function(response) {
                                                    if (response.success) {
                                                        var officerDisposalQty = response.issue_qty;
                                                        console.log("THE ISSUE QTY OF " + selectedOfficer + " is " + officerDisposalQty);
                                                        var newDisposalQty = officerDisposalQty - issueQty; // Subtract the issueQty of the current row
                                                        console.log(newDisposalQty);
                                                        $(document).trigger(
                                                            "disposedQtyUpdated", [
                                                                newDisposalQty,
                                                                selectedOfficer
                                                            ]);
                                                    } else {
                                                        console.error('Failed to fetch issue_qty for officer ' + selectedOfficer);
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Failed to fetch issue_qty for officer ' + selectedOfficer + ': ' + error);
                                                }
                                            });
                                        } else {
                                            console.log("No matching office officer found.");
                                        }
                                        });

                                        
                                    });

                                }else{
                                    console.log('error');
                                }

                                if (issueTransferValue === "TRANSFER") {
                                    $row.find('#transfer_dropdown').show();
                                } else {
                                    $row.find('#transfer_dropdown').hide();
                                    $row.find('select[name="transfer_dropdown"]').val("");
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
                    } catch (error) {
                        console.error("An error occurred:", error);
                    }
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

                    $(this).closest("tr").find('input[name="new_bal_qty"]').val(balanceQty);
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
                //CALCULATION OF BAL QTY FOR MORE THAN 2 ROWS
                function calculateNewBalQty() {
                    // Get the parent row
                    var $row = $(this).closest("tr");
                    $row.find('select[name="transfer_dropdown"]').val(0).prop("hidden", true);
                    var index = $row.index()
                    if (index > 1 && index < $("table tbody tr").length) {
                        $.ajax({
                            url: "/get-latest-issue-row",
                            method: "GET",
                            success: function(response) {
                                if (response.new_bal_qty) {

                                    console.log('ISSUE HAS BEEN FOUND!');
                                    var prevRowBalQty = parseFloat(response.new_bal_qty);
                                    var unitCost = parseFloat($row.closest(".modal-body").find(
                                        'input[name="receipt_unitcost"]').val()) || 0;
                                    var issueQty = parseFloat($row.find('input[name="issue_qty"]').val());
                                    var newBalQty = prevRowBalQty - issueQty;
                                    var newBalAm = unitCost * newBalQty;
                                    console.log(newBalQty, newBalAm);

                                    $row.find('input[name="new_bal_qty"]').val(newBalQty);
                                    $row.find('input[name="bal_amount"]').val(newBalAm.toFixed(2));
                                } else {
                                    console.log("No previous row with ISSUE value found.");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error fetching latest issue row:", error);
                            }
                        });
                    }
                }
                // Attach the input event handler
                $(document).on("input", 'table tbody tr:last input[name="issue_qty"]', calculateNewBalQty);
                // Event handler for when issueQty is updated
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
                            url: "/add-prop-extension",
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
                            url: "/add-prop-extension",
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
                        url: "/add-prop-extension",
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
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        },
                    });

                    $(this).parents("tr").find(".add, .edit").toggle();
                    $("table tbody tr:last-child").find(".edit-add").hide();
                    $(".add-new").removeAttr("disabled", "disabled");
                });
                $(document).on("click", ".edit", function() {
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-id");

                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-prop-ext-data/" + editId,
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
                        url: "/update-prop-ext-data/" + editId, // Use editId in the URL
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
                $(document).on("click", ".delete", function() {
                    var editId = $(this).data("edit-id");
                    var $deleteButton = $(this); // Store reference to the delete button

                    // Perform an AJAX request to delete the data on the server
                    $.ajax({
                        type: "DELETE", // Use DELETE method
                        url: "/delete-propext-data/" + editId, // Use editId in the URL
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

            });
        </script>



    </div>
    </div>
</body>

</html>
