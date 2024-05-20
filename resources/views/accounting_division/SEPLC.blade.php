<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ACCOUNTING DIVISION</title>
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

        /* .centered-card {
            margin: 0 auto;
            max-width: 200%;
        } */
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
                        <div>Semi - Expandable Property Ledger Cards | Overview</div>
                    </h1>
                    <div class="row">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3"
                                        role="tab" aria-controls="home" aria-selected="true">All Cards</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel" <hr>
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
                                        <div class="card" style="width:100%">
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
                                                            <h5 class="modal-title" id="editItemModalLabel">Create
                                                                Semi-Expendable Property Ledger Card</h5>
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
                                                                                            value="{{ $sep->entity_name }}"
                                                                                            readonly>
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
                                                                                            value="{{ $sep->fund_cluster }}"
                                                                                            readonly>
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
                                                                                <div class="row mb-3">
                                                                                    <!-- Added mb-3 class to add margin bottom -->
                                                                                    <div class="col-md-3">
                                                                                        <label
                                                                                            class="col-form-label"><b>Semi-Expendable
                                                                                                Property:</b></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            name="prop_plant_eq"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->sep_name }}"
                                                                                            readonly>
                                                                                        @error('prop_plant_eq')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <label
                                                                                            class="col-form-label"><b>Semi-Expendable
                                                                                                Property
                                                                                                Number:</b></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            name="prop_no"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->sep_no }}"
                                                                                            readonly>
                                                                                        @error('prop_no')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <!-- Added mb-3 class to add margin bottom -->
                                                                                    <div class="col-md-3">
                                                                                        <label
                                                                                            class="col-form-label"><b>Description:</b></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            name="desc"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->desc }}"
                                                                                            readonly>
                                                                                        @error('desc')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <label
                                                                                            class="col-form-label"><b>UACS
                                                                                                Object Code:</b></label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            name="uacs_obj_code"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->uacs_obj_code }}">
                                                                                        @error('uacs_obj_code')
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
                                                                                        class="table table-bordered table-resizable"
                                                                                        style="font-size: 10px">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col"
                                                                                                    colspan="">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="">
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
                                                                                                    colspan=""
                                                                                                    style="text-align: center;">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan=""
                                                                                                    style="text-align: center;">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="2"
                                                                                                    style="text-align: center;">
                                                                                                    REPAIR HISTORY
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
                                                                                                    ISSUE / TRANSFERS /
                                                                                                    ADJUSTMENTS
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ACCUMULATED
                                                                                                    IMPAIRMENT LOSSES
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ADJUSTED COST
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    NATURE OF REPAIR
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    AMOUNT
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ACTION
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td><input
                                                                                                        type="date"
                                                                                                        value="{{ $sep->date }}"
                                                                                                        name="date"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="acctg_reference" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{ $sep->acctg_reference }}</textarea>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="particulars" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{ $sep->particulars }}</textarea>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="receipt_qty"
                                                                                                        value="{{ $sep->receipt_qty }}"
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        id="receipt-qty"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="receipt_unitcost"
                                                                                                        value="{{ $sep->receipt_unitcost }}"
                                                                                                        class="form-control text-line receipt-input"
                                                                                                        id="receipt-unitost"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="receipt_totalcost"
                                                                                                        value="{{ $sep->receipt_totalcost }}"
                                                                                                        class="form-control text-line receipt-total"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;">
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="it_adjustment"
                                                                                                        value="{{ $sep->it_adjustment }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="accu_impairment_losses"
                                                                                                        value="{{ $sep->accu_impairment_losses }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="adj_cost"
                                                                                                        value="{{ $sep->adj_cost }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="nature_of_repair"
                                                                                                        value="{{ $sep->nature_of_repair }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td><input
                                                                                                        type="text"
                                                                                                        name="repair_amount"
                                                                                                        value="{{ $sep->repair_amount }}"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder="">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class="edit"
                                                                                                        title="Edit"
                                                                                                        data-edit-seplc="{{ $sep->id }}"
                                                                                                        data-toggle="tooltip"><i
                                                                                                            class="material-icons">&#xE254;</i></a>
                                                                                                    <a class="editadd"
                                                                                                        title="Add"
                                                                                                        data-edit-add-propid="{{ $sep->id }}"
                                                                                                        data-toggle="tooltip">
                                                                                                        <i
                                                                                                            class="material-icons">check</i>
                                                                                                    </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            @foreach ($semi_ext->where('semi_id', $sep->id) as $data)
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="date"
                                                                                                            value="{{ \Carbon\Carbon::parse($data->date)->format('Y-m-d') }}"
                                                                                                            id="dateInput"
                                                                                                            name="date"
                                                                                                            class="form-control text-line date-input"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="dd/mm/yyyy">
                                                                                                    </td>

                                                                                                    <script>
                                                                                                        flatpickr('#dateInput', {
                                                                                                            dateFormat: "d/m/Y",
                                                                                                        });
                                                                                                    </script>


                                                                                                    <td>
                                                                                                        <textarea type="text" name="acctg_reference" class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{ $data->acctg_reference }}</textarea>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        @if ($data->issue_transfer_disposal == 'ISSUE')
                                                                                                            <textarea type="text" name="particulars" class="form-control text-line"
                                                                                                                style="padding-top: 4px; padding-bottom: 4px;" placeholder="">Issuance</textarea>
                                                                                                        @elseif($data->issue_transfer_disposal == 'TRANSFER')
                                                                                                            <textarea type="text" name="particulars" class="form-control text-line"
                                                                                                                style="padding-top: 4px; padding-bottom: 4px;" placeholder="">Transfer</textarea>
                                                                                                        @elseif($data->issue_transfer_disposal == 'RETURN')
                                                                                                            <textarea type="text" name="particulars" class="form-control text-line"
                                                                                                                style="padding-top: 4px; padding-bottom: 4px;" placeholder="">Return</textarea>
                                                                                                        @else
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="receipt_qty"
                                                                                                            value="{{ $data->receipt_qty }}"
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-qty"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="receipt_unitcost"
                                                                                                            value="{{ $data->receipt_unitcost }}"
                                                                                                            class="form-control text-line receipt-input"
                                                                                                            id="receipt-unitost"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="receipt_totalcost"
                                                                                                            value="{{ $data->receipt_totalcost }}"
                                                                                                            class="form-control text-line receipt-total"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="it_adjustment"
                                                                                                            value="{{ $data->it_adjustment }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="accu_impairment_losses"
                                                                                                            value="{{ $data->accu_impairment_losses }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="adj_cost"
                                                                                                            value="{{ $data->adj_cost }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="nature_of_repair"
                                                                                                            value="{{ $data->nature_of_repair }}"
                                                                                                            class="form-control text-line"
                                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                            placeholder="">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="text"
                                                                                                            name="repair_amount"
                                                                                                            value="{{ $data->repair_amount }}"
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
                                                                            data-semi-id="{{ $sep->id }}"
                                                                            class="btn btn-info add-new"><i
                                                                                class="fa fa-plus"></i>
                                                                            Add New</button>
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        <button type="button"
                                                                            onclick="navigateToPrintablePage()"
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
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                // Function to navigate to the printable page
                                                function navigateToPrintablePage() {
                                                    // Assuming 'sep_id' is the parameter to be passed
                                                    var sep_id = '{{ $sep->id }}';
                                                    // Navigate to the printable page
                                                    window.location.href = '/printable-prop-page/' + sep_id;
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


        {{-- <script>
            var csrfToken = "{{ csrf_token() }}";
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();

                $(document).on('click', '.add-new', function(event) {
                    event.preventDefault();
                    var uacsObjCodeValue = $('input[name="uacs_obj_code"]').val();
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
                        $('<td>').append(
                            '<input  type="date" class="form-control text-line" name="date" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input  type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                        ),
                        $('<td>').append(
                            '<input  type="text" name="particulars" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line receipt-input" name="receipt_qty" id="receipt_qtyy" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line receipt-input" name="receipt_unitcost" id="receipt_unitcost" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line receipt-total" name="receipt_totalcost" id="receipt_totalcost" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="it_adjustment" style="padding-top: 4px; padding-bottom: 4px;" value="" placeholder="-">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="accu_impairment_losses" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="adj_cost" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="nature_of_repair" style="padding-top: 4px; padding-bottom: 4px;" value="">'
                        ),
                        $('<td>').append(
                            '<input type="text" class="form-control text-line" name="repair_amount" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value="">'
                        ),
                        $('<td>').append(actions),
                        $('<td hidden>').append('<input type="text" name="seplc_id" value="' + semiId +
                            '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                        ),
                        $('<td hidden>').append('<input type="text" name="uacs_obj_code" value="' +
                            uacsObjCodeValue +
                            '" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">'
                        )
                    );


                    $("table").append(row);
                    var rowCount = table.find("tr").length;
                    console.log("rowCount:", rowCount);

                    $(document).on('input', 'input[name="receipt_qty"], input[name="receipt_unitcost"]',
                        function() {
                            // Get the values of quantity and unit cost from the row containing the changed input field
                            var row = $(this).closest('tr');
                            var qty = parseFloat(row.find('input[name="receipt_qty"]').val()) || 0;
                            var unitCost = parseFloat(row.find('input[name="receipt_unitcost"]').val()) ||
                                0;

                            // Calculate the total cost
                            var totalCost = qty * unitCost;

                            // Display the total cost in the respective input field within the same row
                            row.find('input[name="receipt_totalcost"]').val(totalCost.toFixed(
                                2)); // Assuming you want 2 decimal places
                            row.find('input[name="adj_cost"]').val(totalCost.toFixed(
                                2));
                        });

                    //IT Adjusments


                    //AccumulatedImpairmentLosses
                    $(document).on('input', 'input[name="accu_impairment_losses"]', function() {
                        var currentAIL = parseFloat($(this).val()) || 0;
                        var currentInput = $(this); // Store the reference to 'this'

                        // Make an AJAX call to get the latest adj_cost
                        $.ajax({
                            url: '/get-latest-adj-cost',
                            type: 'GET',
                            success: function(response) {
                                // Get the latest adj_cost from the response
                                var adjCost = parseFloat(response.latest_adj_cost) || 0;

                                // Calculate the new adj_cost
                                var newAdjCost = adjCost - currentAIL;

                                // Set the new adj_cost in the input field
                                currentInput.closest('tr').find('input[name="adj_cost"]')
                                    .val(newAdjCost.toFixed(
                                        2)); // Assuming you want 2 decimal places

                                // Store the current value of it_adjustment as the previous value for the next change
                                currentInput.data('previous-value', currentAIL);
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    });

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
                                            selectDropdown.append($('<option>').attr(
                                                    'value', item)
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
                                                        console.log(
                                                            'ISSUE HAS BEEN FOUND!'
                                                        );
                                                        var prevRowBalQty =
                                                            parseFloat(response
                                                                .bal_qty);
                                                        var unitCost = parseFloat(
                                                            $row.closest(
                                                                ".modal-body")
                                                            .find(
                                                                'input[name="receipt_unitcost"]'
                                                            ).val()) || 0;
                                                        var issueQty = parseFloat(
                                                            $row.find(
                                                                'input[name="issue_qty"]'
                                                            ).val());
                                                        var newBalQty =
                                                            prevRowBalQty -
                                                            issueQty;
                                                        var newBalAm = unitCost *
                                                            newBalQty;
                                                        console.log(newBalQty,
                                                            newBalAm);

                                                        $row.find(
                                                            'input[name="bal_qty"]'
                                                        ).val(newBalQty);
                                                        $row.find(
                                                            'input[name="bal_amount"]'
                                                        ).val(newBalAm
                                                            .toFixed(2));
                                                    } else {
                                                        console.log(
                                                            "No previous row with ISSUE value found."
                                                        );
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(
                                                        "Error fetching latest issue row:",
                                                        error);
                                                }
                                            });
                                        } else {
                                            console.log("error");
                                        }
                                    });
                                });
                            } else if (issueTransferValue === "RETURN") {
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
                                            selectDropdown.append($('<option>').attr(
                                                    'value', item)
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
                            } else {
                                console.log('error');
                            }

                            if (issueTransferValue === "TRANSFER") {
                                $row.find('#transfer_from').show();
                            } else if (issueTransferValue === "RETURN") {
                                $row.find('#transfer_from').show();

                            } else {
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
                        url: "/add-seplc-data",
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
            });
        </script> --}}

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

        <script>
            $(document).ready(function() {
                // Click event handler for the "edit" icon
                $(document).on("click", ".edit", function() {
                    console.log("Edit icon clicked");
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-seplc");
                    console.log(editId);
                    var clickedEdit = $(this); // Store reference to the clicked element

                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-seplc-data/" + editId,
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
                    var uacsObjCodeValue = $('input[name="uacs_obj_code"]').val();
                    rowData["uacs_obj_code"] = uacsObjCodeValue;

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
                        url: "/update-seplc-data/" + propId, // Use editId in the URL
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

        {{-- FOR EDITING THE EXT SEPLC --}}
        <script>
            $(document).ready(function() {
                // Click event handler for the "edit" icon
                $(document).on("click", ".edit-data", function() {
                    console.log("Edit icon clicked");
                    var row = $(this).closest("tr");
                    var editId = $(this).data("edit-seplc");
                    console.log(editId);
                    if (editId) {
                        $.ajax({
                            type: "GET",
                            url: "/get-seplc-ext-data/" + editId,
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

                                // Input event handler for it_adjustment
                                $(document).on('input',
                                    'input[name="it_adjustment"], input[name="accu_impairment_losses"]',
                                    function() {
                                        var currentInput = $(this);
                                        var currentValue = parseFloat(currentInput.val()) || 0;
                                        var row = currentInput.closest('tr');
                                        var rowCount = $("table tbody tr").length;
                                        console.log("rowCount:", rowCount);
                                        if(rowCount = 12){
                                            // Perform the AJAX request and update adj_cost for it_adjustment
                                            $.ajax({
                                                url: '/getLatestData/' + editId,
                                                type: 'GET',
                                                success: function(previousRow) {
                                                    var adjCostPrev = parseFloat(
                                                            previousRow.adj_cost) ||
                                                        0;
                                                    var adjustmentDifference =
                                                        adjCostPrev - currentValue;
                                                    var adjCostInputCurr = row.find(
                                                        'input[name="adj_cost"]'
                                                        );
                                                    adjCostInputCurr.val(
                                                        adjustmentDifference
                                                        .toFixed(2));
                                                    currentInput.data(
                                                        'previous-value',
                                                        currentValue);
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(
                                                        'Error fetching latest data:',
                                                        error);
                                                }
                                            });
                                        }else if (rowCount > 12){
                                            $.ajax({
                                                url: '/getLatestData/' + editId,
                                                type: 'GET',
                                                success: function(previousRow) {
                                                    var adjCostPrev = parseFloat(
                                                            previousRow.adj_cost) ||
                                                        0;
                                                    var adjustmentDifference =
                                                        adjCostPrev - currentValue;
                                                    var adjCostInputCurr = row.find(
                                                        'input[name="adj_cost"]'
                                                        );
                                                    adjCostInputCurr.val(
                                                        adjustmentDifference
                                                        .toFixed(2));
                                                    currentInput.data(
                                                        'previous-value',
                                                        currentValue);
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(
                                                        'Error fetching latest data:',
                                                        error);
                                                }
                                            });
                                        }

                                    });
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
                        url: "/update-seplcext-data/" + propId, // Use editId in the URL
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
    </div>
</body>

</html>
