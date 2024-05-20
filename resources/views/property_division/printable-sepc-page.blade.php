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
            /* display: flex; */
            align-items: center;
            justify-content: center;
            width: 100%;

            /* padding: 30px; */
            /* margin: 0; */
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
                width: 120%;
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
                padding: 12px;
                font-size: 12px;
                border: none;
                border-bottom: 1px solid #ccc;
                border-radius: 0;
                background-color: transparent;
            }

            .logoreport {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                padding: 20px;
                background-color: #fff;
                border-bottom: 1px solid #000;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .logoreport img {
                width: 100px;
                max-height: 100px;
                margin-right: 10px;
            }

            .sidebar-brand b {
                font-size: 24px;
            }

            /* Display logoreport only on the first page */
            @page {
                .logoreport {
                    display: block !important;
                }

                .logoreport~.logoreport {
                    display: none !important;
                }
            }
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
    <div class="card-header">
        <br>
        <div>
            <a href="{{ url('/all-forms') }}"> <button class="btn btn-primary no-print"> <small>
                        << </small>back</button></a>
        </div>
        <br>
        {{-- <div class="card"> --}}

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
                                                            value="{{ $sep_card->entity_name }}" readonly>
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
                                                            value="{{ $sep_card->fund_cluster }}" readonly>
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
                                                            value="{{ $sep_card->sep_name }}" readonly>
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
                                                            value="{{ $sep_card->desc }}" readonly>
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
                                                            value="{{ $sep_card->sep_no }}" readonly>
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
                                                                        value="{{ $sep_card->date }}">
                                                                    @error('date')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </td>
                                                                <td>
                                                                    <textarea type="text" name="ref" class="form-control text-line"
                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="@error('ref') {{ $message }} @enderror">{{ $sep_card->ref }}</textarea>
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
                                                                        value="{{ $sep_card->receipt_qty }}"
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
                                                                        value="{{ $sep_card->receipt_unitcost }}"
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
                                                                        value="{{ $sep_card->receipt_totalcost }}"
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
                                                                        value="{{ $sep_card->item_no }}">{{ $sep_card->item_no }}</textarea>
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
                                                                        value="{{ $sep_card->issue_qty }}" hidden>
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
                                                                        value="{{ $sep_card->transfer_from }}" hidden>
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
                                                                        value="{{ $sep_card->office_officer }}" hidden>
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
                                                                        value="{{ $sep_card->issue_transfer_disposal }}" hidden>
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
                                                                        value="{{ $sep_card->bal_qty }}"
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
                                                                        value="{{ $sep_card->bal_amount }}">
                                                                    @error('bal_amount')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </td>
                                                                <td>
                                                                    <textarea type="text" name="remarks" class="form-control text-line"
                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="" hidden>{{ $sep_card->remarks }}</textarea>
                                                                    @error('remarks')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </td>

                                                            </tr>
                                                            @foreach ($semi_ext->where('semi_id', $sep_card->id) as $data)
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
                                                                    value="{{ $sep_card->item_no }}"
                                                                    class="form-control text-line"
                                                                    style="padding-top: 4px; padding-bottom: 4px;"
                                                                    placeholder="" hidden>
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
                                <div class="btn-print no-print" style="display: flex; justify-content: center;">
                                    <button onclick="window.print()" class="btn btn-success">Print Report</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
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

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('
                                error ') }}',
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
