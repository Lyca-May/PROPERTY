<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('circle_logo.png') }}" type="image/png">
    <meta name="description" content="" />
    <meta name="author" content="" />


    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}


    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;

            /* padding: 30px; */
            /* margin: 0; */
        }

        .card {
            /* max-width: 1600px; */
            /* min-height: 200px; */
            padding: 45px;
            flex-direction: column;
            justify-content: space-between;
            display: flex;

            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.45);
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.25);
        }

        @media print {
            .no-print {
                display: none !important;
                text-align: center;


            }

            .print-content {
                display: block;
            }

            .table {
                width: 100%;

            }

            .table thead th {
                background-color: #f0f0f0;
            }


            .table td {
                width: auto;
            }

            .title {
                text-align: center;
            }

            .text-line {
                width: 100%;
                padding: 8px;
                font-size: 16px;
                border: none;
                border-bottom: 1px solid #ccc;
                border-radius: 0;
                background-color: transparent;
            }
        }
    </style>

</head>

<body>

    <div class="card-header">
        <div class="card">
            <div>
                <a href="{{ url ('/all-forms')}}"> <button  class="btn btn-primary no-print"> <small><< </small>back</button></a>
            </div>
            <div class="row">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="print-content">
                                {{-- <div class="page"> --}}
                                <header style="text-align: center;">
                                    <div class="logoreport">
                                        <img src="{{ asset('assets/img/BFAR_LOGO.png') }}" alt="generic business logo"
                                            style="width: 100px; max-height: 100px" />
                                        <img src="{{ asset('assets/img/newphil.png') }}" alt="generic business logo"
                                            style="width: 90px; max-height: 90px" />
                                        <div class="sidebar-brand">
                                            <b>Property & Supplies Unit | STOCK CARD</b>
                                        </div>
                                    </div>
                                </header>
                                </br>
                                <br>
                                <table>
                                    <form
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
                                                    <div class="table-responsive">
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
                                                                        colspan="3"
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
                                                            <tbody>
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
                                                                            id="receipt_qty"
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            value="{{ $stock_cards->receipt_qty }}"
                                                                            data-card-id="{{ $stock_cards->id }}">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            name="receipt_unitcost"
                                                                            id="receipt_unitcost"
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            value="{{ $stock_cards->receipt_unitcost }}"
                                                                            data-card-id="{{ $stock_cards->id }}"data-card-id="{{ $stock_cards->id }}">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            name="receipt_totalcost"
                                                                            id="receipt_totalcost"
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            value="{{ $stock_cards->receipt_totalcost }}"
                                                                            readonly
                                                                            data-card-id="{{ $stock_cards->id }}">
                                                                    </td>
                                                                    <!-- Issue section -->
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            name="issue_qty"
                                                                            id="issue_qty"
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            value="{{ $stock_cards->issue_qty }}"
                                                                            data-card-id="{{ $stock_cards->id }}">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            name="issue_unitcost"
                                                                            id="issue_unitcost"
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            value="{{ $stock_cards->issue_unitcost }}"
                                                                            data-card-id="{{ $stock_cards->id }}">
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            name="issue_totalcost"
                                                                            id="issue_totalcost"
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            value="{{ $stock_cards->issue_totalcost }}"
                                                                            readonly
                                                                            data-card-id="{{ $stock_cards->id }}">
                                                                    </td>
                                                                    <!-- Bal section -->
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            name=""
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            placeholder=""
                                                                            readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            name=""
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            placeholder=""
                                                                            readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input
                                                                            type="text"
                                                                            class="form-control text-line"
                                                                            style="padding-top: 4px; padding-bottom: 4px;"
                                                                            placeholder=""
                                                                            readonly>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <br>
                            </table>
                            <div class="btn-print no-print" style="margin-left:750px">
                                <button onclick="window.print()" class="btn btn-success">Print Report</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/js/jsadmin/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jsadmin/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/jsadmin/bootstrap.min.js') }}"></script>

<!-- simplebar js -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('assets/js/jsadmin/sidebar-menu.js') }}"></script>
<!-- loader scripts -->
<script src="{{ asset('assets/js/jsadmin/jquery.loading-indicator.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/jsadmin/app-script.js') }}"></script>
<!-- Chart js -->

<script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>

<!-- Index js -->
<script src="{{ asset('assets/js/jsadmin/index.js') }}"></script>
<script src="{{ asset('assets/js/inventory.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
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

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
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
    // JavaScript to update the current date and time
    function updateCurrentDateTime() {
        const currentDateTimeElement = document.getElementById("currentDateTime");
        const now = new Date();
        const formattedDateTime = now.toLocaleString(); // You can format the date and time as needed
        currentDateTimeElement.textContent = formattedDateTime;
    }

    // Call the function to initially set the date and time
    updateCurrentDateTime();

    // Optionally, update the date and time every second (or as needed)
    setInterval(updateCurrentDateTime, 1000);
</script>
</body>

</html>
