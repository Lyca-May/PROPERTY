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
                        <div>Semi - Expandable Cards | Overview</div>
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
                                                        semi - expandable card
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
                                        @foreach ($sep_card as $sep)
                                            <div class="col-lg-3 col-md-6 col-sm-12 mb-12">
                                                <!-- Modal trigger element -->
                                                <a class="card2" href="#" data-toggle="modal"
                                                    data-target="#editItemModal{{ $sep->id }}">
                                                    <div class="card-body">
                                                        <h3 class="card-title">ENTITY NAME:
                                                            {{ $sep->entity_name }}
                                                        </h3>
                                                        <h3 class="card-title">FUND CLUSTERE:
                                                            {{ $sep->fund_cluster }}
                                                        </h3>
                                                        <h3 class="card-text small">NAME:
                                                            {{ $sep->sep_name }}
                                                        </h3>
                                                        <p class="card-text small">Property No/Object Account Code:
                                                            {{ $sep->sep_no }}
                                                        </p>
                                                    </div>
                                                    <div class="go-corner" href="#">
                                                        <div class="go-arrow">
                                                            →
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
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
                                                                                            value="{{ $sep->entity_name }}">
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
                                                                                            value="{{ $sep->fund_cluster }}">
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
                                                                                            value="{{ $sep->sep_name }}">
                                                                                        @error('prop_plant_eq')
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
                                                                                            value="{{ $sep->sep_no }}"">
                                                                                        @error('prop_no')
                                                                                            <span
                                                                                                class=" text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            class="col-form-label"><b>Description:</b></label>
                                                                                        <input type="text"
                                                                                            name="desc"
                                                                                            class="form-control text-line"
                                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                                            value="{{ $sep->desc }}">
                                                                                        @error('desc')
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
                                                                                                    colspan="2">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
                                                                                                    style="text-align: center;">
                                                                                                    RECEIPT
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="3"
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
                                                                                                        type="text"
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
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="item_no"
                                                                                                        id="item_no"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->item_no }}">
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
                                                                                                        value="{{ $sep->issue_qty }}">
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
                                                                                                        value="{{ $sep->office_officer }}">
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
                                                                                                        readonly>
                                                                                                    @error('bal_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="number"
                                                                                                        name="amount"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $sep->amount }}">
                                                                                                    @error('amount')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="remarks" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{ $sep->remarks }}</textarea>
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
                                                                {{-- <div class="row">
                                                                    <div class="col-md-6">

                                                                        <a type="button" class="btn btn-danger"
                                                                            href="{{ url('/view-seplc/' . $sep->id) }}">View
                                                                            SEP Ledger Card</a>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">

                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                        <button type="button"
                                                                            onclick="navigateToPrintablePage()"
                                                                            class="btn btn-success">Preview</button>
                                                                    </div>
                                                                </div> --}}
                                                            </form>
                                                            <button type="button"
                                                                data-stock-id="{{ $sep->id }}"
                                                                class="btn btn-info add-new"><i
                                                                    class="fa fa-plus"></i>
                                                                Add New</button>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <script>
                                                // Function to navigate to the printable page
                                                function navigateToPrintablePage() {
                                                    // Assuming 'sep_id' is the parameter to be passed
                                                    var sep_id = '{{ $sep->id }}';
                                                    // Navigate to the printable page
                                                    window.location.href = '/printable-prop-page/' + sep_id;
                                                }
                                            </script> --}}
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
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
                var actions = $("table td:last-child").html();
                // Append table with add row form on add new button click
                $(".add-new").click(function() {
                    $(this).attr("disabled", "disabled");
                    var index = $("table tbody tr:last-child").index();
                    var row = '<tr>' +
                        '<td><input type="date" class="form-control text-line" name="date" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" name="ref" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
                        '<td><input type="text" class="form-control text-line receipt-input" name="receipt_qty" id="receipt_qtyy" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value=""></td>' +
                        '<td><input type="text" class="form-control text-line receipt-input" name="receipt_unitcost" id="receipt_unitcost" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value=""></td>' +
                        '<td><input type="text" class="form-control text-line receipt-total" name="receipt_totalcost" id="receipt_totalcost" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="item_no" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="issue_qty" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="office_officer" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="bal_qty" style="padding-top: 4px; padding-bottom: 4px;" value=""></td>' +
                        '<td><input type="text" class="form-control text-line" name="amount" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" value=""></td>' +
                        '<td><input type="text" name="remarks" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder=""></td>' +
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
