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
                                                                                                    colspan="6"
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
                                                                                                            value="issue"
                                                                                                            hidden>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="transfer"
                                                                                                            id="issue_office_officer2"
                                                                                                            value="tra"
                                                                                                            hidden>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="disposal"
                                                                                                            id="issue_office_officer3"
                                                                                                            value="value3"
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
                                                                                                            name="transform_drop"
                                                                                                            value="{{ $data->transform_drop }}"
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
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="issue_transfer_disposal"
                                                                                                            value="ISSUE"
                                                                                                            {{ $data->issue_transfer_disposal == 'ISSUE' ? 'checked' : '' }}>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="issue_transfer_disposal"
                                                                                                            value="TRANSFER"
                                                                                                            {{ $data->issue_transfer_disposal == 'TRANSFER' ? 'checked' : '' }}>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            name="issue_transfer_disposal"
                                                                                                            value="DISPOSAL"
                                                                                                            {{ $data->issue_transfer_disposal == 'DISPOSAL' ? 'checked' : '' }}>
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
                                                                                                            name="bal_amount"
                                                                                                            value="{{ $data->bal_amount }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
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
                                                                                                        <a class="add"
                                                                                                            title="Add"
                                                                                                            data-edit-add-propid="{{ $prop_cards->id }} "
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE03B;</i></a>
                                                                                                        <a class="edit"
                                                                                                            title="Edit"
                                                                                                            data-edit-id="{{ $data->id }}"
                                                                                                            data-edit-id="{{ $prop_cards->id }} "
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
                        var propId = $(this).data(
                        "prop-id"); // Get the propID associated with the clicked button
                        var modal = $('#editItemModal' + propId); // Find the modal with the specific propID
                        var table = modal.find(
                        '.table-bordered.table-resizable tbody'); // Find the table within the modal
                        var editId = $(this).data("edit-id");
                        var actions =
                            '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
                            '<a class="edit" title="Edit" data-edit-id="' +
                            editId +
                            '" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
                            '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>';
                        var filteredOfficers = {!! json_encode($filteredOfficers) !!};
                        console.log(filteredOfficers);
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
                                $('<select>').attr({
                                    'name': 'transfer_dropdown',
                                    'id': 'transfer_dropdown',
                                    'class': 'form-control text-line',
                                    'style': 'padding-top: 4px; padding-bottom: 4px;'
                                }).append(
                                    // Append options dynamically from filteredOfficers array
                                    filteredOfficers.map(function(officer) {
                                        return $('<option>').attr('value', officer).text(
                                            officer);
                                    })
                                )
                            ),
                            $('<td>').append(
                                '<input type="text" name="office_officer" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            ),
                            // Checkboxes for Issue, Transfer, and Disposal
                            $('<td>').append(
                                '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal1" value="ISSUE">'
                            ),
                            $('<td>').append(
                                '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal2" value="TRANSFER">'
                            ),
                            $('<td>').append(
                                '<input type="checkbox" name="issue_transfer_disposal" id="issue_transfer_disposal3" value="DISPOSAL">'
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
                            $('<td>').append('<input type="text" name="prop_id" value="' + propId +
                                '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                            )
                        );

                        table.append(row); // Append the row to the table within the modal
                        var rowCount = table.find("tr").length; // Count the number of rows in the table
                        console.log("rowCount:", rowCount);

                        // var isTransferChecked = false; // Flag to track if "TRANSFER" checkbox is checked

                        // // Disable and clear bal_qty and bal_amount if "TRANSFER" checkbox is checked
                        // $('table tbody tr:last input[name="issue_transfer_disposal"]').change(function() {
                        //     var isChecked = $(this).is(":checked");
                        //     console.log("Checkbox value:", $(this).val());
                        //     if ($(this).val() === "TRANSFER" && isChecked) {
                        //         // Disable and clear bal_qty and bal_amount
                        //         $('table tbody tr:last input[name="new_bal_qty"]').prop('disabled', true).val('');
                        //         $('table tbody tr:last input[name="bal_amount"]').prop('disabled', true).val('');
                        //         isTransferChecked = true; // Update flag
                        //     }else {
                        //         // Enable bal_qty and bal_amount
                        //         $('table tbody tr:last input[name="new_bal_qty"]').prop('disabled', false);
                        //         $('table tbody tr:last input[name="bal_amount"]').prop('disabled', false);
                        //         isTransferChecked = false; // Update flag
                        //     }
                        // });

                        if (rowCount === 2) {
                            console.log("row 2 added.");
                            calculateBalance();
                        } else if (rowCount > 2) {
                            console.log("more than 2 row added.");
                            // if (!!isTransferChecked) {
                                $(document).on(
                                    "input",
                                    'table tbody tr:last input[name="issue_qty"]',
                                    function() {
                                        // Get the parent row
                                        var $row = $(this).closest("tr");

                                        // Get the index of the current row
                                        var index = $row.index();

                                        // Check if the current row is not the first or last row
                                        if (index > 1 && index < $("table tbody tr").length) {
                                            // Get the input field for new_bal_qty in the second to the last row
                                            var prevRowBalQtyInput = $row.prev().prev().find(
                                                'input[name="new_bal_qty"]');
                                            var prevRowBalQtyValue = prevRowBalQtyInput.val();
                                            var prevRowBalQty = parseFloat(prevRowBalQtyValue);
                                            console.log("Previous Row Bal Qty:", prevRowBalQty);
                                            var unitCost =
                                                parseFloat(
                                                    $(this)
                                                    .closest(".modal-body")
                                                    .find('input[name="receipt_unitcost"]')
                                                    .val()
                                                ) || 0;
                                            console.log("Unitcost:", unitCost);
                                            // Get the last row's issue_qty
                                            var $lastRow = $("table tbody tr:last");
                                            var issueQty = parseFloat($lastRow.find('input[name="issue_qty"]')
                                                .val());
                                            console.log("Issue Qty:", issueQty);
                                            var newBalQty = prevRowBalQty - issueQty;

                                            var newBalAm = unitCost * newBalQty;
                                            console.log("New Bal Qty:", newBalQty);
                                            $row.find('input[name="new_bal_qty"]').val(newBalQty);
                                            $row.find('input[name="bal_amount"]').val(newBalAm);
                                        } else {
                                            console.log("NO VALUE FOR THE PREVIOUS BAL QTY");
                                        }
                                    }
                                );
                            // }else{
                            //     console.log('isTransferChecked is true. No calculation needed');
                            // }
                        }
                        $("table tbody tr:last-child").find(".add").show();
                        $("table tbody tr:last-child").find(".edit").hide();
                        $('[data-toggle="tooltip"]').tooltip();
                    } catch (error) {
                        console.error("An error occurred:", error);
                    }
                });

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

                $(document).on("click", ".add", function() {
                    var rowData = {};
                    var input = $(this)
                        .parents("tr")
                        .find(
                            'input[type="text"], input[type="date"], textarea, input[type="checkbox"], select'
                        );
                    input.each(function() {
                        var name = $(this).attr("name");
                        var value = $(this).val();
                        if ($(this).attr("type") === "checkbox") {
                            if ($(this).is(":checked")) {
                                value = "ISSUE";
                            } else if ($(this).prop("checked")) {
                                value = "TRANSFER";
                            } else {
                                value = "DISPOSAL";
                            }
                        }

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

                $(document).on("click", ".add", function() {
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
                            $deleteButton.closest("tr").remove(); // Use the stored reference to deleteButton
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
