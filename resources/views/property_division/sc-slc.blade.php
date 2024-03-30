<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PROPERTY AND SUPPLIES</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{asset('assets/images/property.jpg')}}">


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            background: #ffffff;
            margin: 7.5px 0;
            padding: 20px;
            border: 1px solid #e7e7e7;
            border-radius: 3px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .smaller-font th,
        .smaller-font td,
        .smaller-font input {
            font-size: 12px;
            /* Adjust the font size as needed */
        }

        /* body {
            background-image: url(https://www.houseboating.org/media/Evening-Fishing-800x600.jpghttps://riptidefish.com/wp-content/uploads/2022/03/puget-sound-blackmouth-fishing.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        } */
    </style>

</head>

<body>

    {{-- @include('navbar') --}}
    {{-- @include('sidebar') --}}
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <br>
                                <a type="submit" class="btn btn-danger" href="{{url('/all-forms')}}"> <small><< </small>back</a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="logoreport" style="display: flex; justify-content: center;">
                                        <img src="{{ asset('assets/img/BFAR_LOGO.png') }}" alt="generic business logo" style="width: 80px; max-height: 60px" />
                                        <img src="{{ asset('assets/img/newphil.png') }}" alt="generic business logo" style="width: 70px; max-height: 70px" />
                                    </div>
                                    <h4 style="text-align: center"><b> STOCK CARD</b></h4>
                                    <div class="table-responsive">
                                        @foreach ($stock_card as $stock_cards)
                                        <form action="" method="POST">
                                            @csrf
                                            <div id="print-content" class="modal-body">
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label">
                                                                   <small> Entity Name</small>
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="entity_name" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->entity_name }}">
                                                                    @error('entity_name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label">
                                                                   <small> Fund Cluster</small>
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="fund_cluster" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->fund_cluster }}">
                                                                    @error('fund_cluster')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-lg-12"> -->
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table smaller-font">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Item:</th>
                                                                        <td>
                                                                            <input type="text" name="item_name" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->item_name }}">
                                                                            @error('item_name')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <th scope="row">Stock No:</th>
                                                                        <td>
                                                                            <input type="text" name="stock_no" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->stock_no }}"">
                                                                                @error('stock_no')
                                                                                    <span
                                                                                        class=" text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Description:
                                                                        </th>
                                                                        <td>
                                                                            <input type="text" name="description" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->description }}">
                                                                            @error('description')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <th scope="row">Re-Order Point
                                                                        </th>
                                                                        <td>
                                                                            <input type="text" name="reorder_point" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->reorder_point }}">
                                                                            @error('reorder_point')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Unit of
                                                                            Measurement:
                                                                        </th>
                                                                        <td>
                                                                            <input type="text" name="unit_of_measurement" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->unit_of_measurement }}">
                                                                            @error('unit_of_measurement')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- </div> -->
                                                    <!-- <div class="col-lg-12"> -->
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered smaller-font">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" colspan="2"></th>
                                                                        <th scope="col" colspan="3" style="text-align: center; font-size: 15px;">RECEIPT</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center;">DATE</th>
                                                                        <th scope="col" style="text-align: center;">REFERENCE</th>
                                                                        <th scope="col" style="text-align: center;">QTY</th>
                                                                        <th scope="col" style="text-align: center;">UNIT COST</th>
                                                                        <th scope="col" style="text-align: center;">TOTAL COST</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="date" name="date" class="form-control text-line date-input" style="padding-top: 4px; padding-bottom: 4px; white-space: normal; width: 150px;" value="{{ $stock_cards->date }}">
                                                                            @error('date')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->reference }}">
                                                                            @error('reference')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="receipt_qty" id="receipt_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->receipt_qty }}">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="receipt_unitcost" id="receipt_unitcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->receipt_unitcost }}">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="receipt_totalcost" id="receipt_totalcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->receipt_totalcost }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Issue section -->
                                                                    <tr>
                                                                        <th colspan="5" style="text-align: center; font-size: 15px;">ISSUE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center;">QTY</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">UNIT COST</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">TOTAL COST</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="issue_qty" id="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->issue_qty }}">
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" name="issue_unitcost" id="issue_unitcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->issue_unitcost }}">
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" name="issue_totalcost" id="issue_totalcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->issue_totalcost }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Balance section -->
                                                                    <tr>
                                                                        <th colspan="5" style="text-align: center; font-size: 15px;">BALANCE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center;">QTY</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">UNIT COST</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">TOTAL COST</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" name="" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px; font-size:15px; font-weight:100;" placeholder="FOR ACCOUNTING" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5" scope="col" style="text-align: center;">NO OF DAYS TO CONSUME</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5">
                                                                            <input type="text" name="no_of_days" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->no_of_days }}">
                                                                            @error('no_of_days')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                <div class="logoreport" style="display: flex; justify-content: center;">
                                        <img src="{{ asset('assets/img/BFAR_LOGO.png') }}" alt="generic business logo" style="width: 80px; max-height: 60px" />
                                        <img src="{{ asset('assets/img/newphil.png') }}" alt="generic business logo" style="width: 70px; max-height: 70px" />
                                    </div>
                                    <h4 style="text-align: center"><b> SUPPLIES LEDGER CARD </b></h4>
                                    <div class="table-responsive">
                                        @foreach ($stock_card as $stock_cards)
                                        <form action="" method="POST">
                                            @csrf
                                            <div id="print-content" class="modal-body">
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label">
                                                                <small>  Entity Name </small>
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="entity_name" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->entity_name }}" readonly>
                                                                    @error('entity_name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label">
                                                                <small>  Fund Cluster </small>
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="fund_cluster" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->fund_cluster }}" readonly>
                                                                    @error('fund_cluster')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-lg-12"> -->
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table smaller-font">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Item:</th>
                                                                        <td>
                                                                            <input type="text" name="item_name" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->item_name }}" readonly>
                                                                            @error('item_name')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <th scope="row">Stock No:</th>
                                                                        <td>
                                                                            <input type="text" name="stock_no" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->stock_no }}" readonly>
                                                                            @error('stock_no')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Description:
                                                                        </th>
                                                                        <td>
                                                                            <input type="text" name="description" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->description }}" readonly>
                                                                            @error('description')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <th scope="row">Re-Order Point
                                                                        </th>
                                                                        <td>
                                                                            <input type="text" name="reorder_point" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->reorder_point }}" readonly>
                                                                            @error('reorder_point')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Unit of
                                                                            Measurement:
                                                                        </th>
                                                                        <td>
                                                                            <input type="text" name="unit_of_measurement" class="form-control text-line table-input" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->unit_of_measurement }}" readonly>
                                                                            @error('unit_of_measurement')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- </div> -->
                                                    <!-- <div class="col-lg-12"> -->
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered smaller-font">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" colspan="2"></th>
                                                                        <th scope="col" colspan="3" style="text-align: center; font-size: 15px;">RECEIPT</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center;">DATE</th>
                                                                        <th scope="col" style="text-align: center;">REFERENCE</th>
                                                                        <th scope="col" style="text-align: center;">QTY</th>
                                                                        <th scope="col" style="text-align: center;">UNIT COST</th>
                                                                        <th scope="col" style="text-align: center;">TOTAL COST</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="date" name="date" class="form-control text-line date-input" style="padding-top: 4px; padding-bottom: 4px; white-space: normal; width: 150px;" value="{{ $stock_cards->date }}" readonly>
                                                                            @error('date')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="reference" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->reference }}" readonly>
                                                                            @error('reference')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="receipt_qty" id="receipt_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" onchange="calculateReceiptTotalCost()" value="{{ $stock_cards->receipt_qty }}" readonly>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="receipt_unitcost" id="receipt_unitcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" onchange="calculateReceiptTotalCost()" value="{{ $stock_cards->receipt_unitcost }}" readonly>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="receipt_totalcost" id="receipt_totalcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->receipt_totalcost }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5" style="text-align: center; font-size: 15px;">ISSUE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center;">QTY</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">UNIT COST</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">TOTAL COST</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="issue_qty" id="issue_qty" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" onchange="calculateIssueTotalCost()" value="{{ $stock_cards->issue_qty }}" readonly>
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" name="issue_unitcost" id="issue_unitcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" onchange="calculateIssueTotalCost()" value="{{ $stock_cards->issue_unitcost }}" readonly>
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" name="issue_totalcost" id="issue_totalcost" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->issue_totalcost }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Balance section -->
                                                                    <tr>
                                                                        <th colspan="5" style="text-align: center; font-size: 15px;">BALANCE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center;">QTY</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">UNIT COST</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">TOTAL COST</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" name="" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5" scope="col" style="text-align: center;">NO OF DAYS TO CONSUME</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5">
                                                                            <input type="text" name="no_of_days" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" value="{{ $stock_cards->no_of_days }}" readonly>
                                                                            @error('no_of_days')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>
    </div>


    <script>
        function calculateReceiptTotalCost() {
            var receiptQty = parseFloat(document.getElementById('receipt_qty').value);
            var receiptUnitCost = parseFloat(document.getElementById('receipt_unitcost').value);
            var receiptTotalCost = receiptQty * receiptUnitCost;
            document.getElementById('receipt_totalcost').value = isNaN(receiptTotalCost) ? '' : receiptTotalCost.toFixed(2);
        }

        function calculateIssueTotalCost() {
            var issueQty = parseFloat(document.getElementById('issue_qty').value);
            var issueUnitCost = parseFloat(document.getElementById('issue_unitcost').value);
            var issueTotalCost = issueQty * issueUnitCost;
            document.getElementById('issue_totalcost').value = isNaN(issueTotalCost) ? '' : issueTotalCost.toFixed(2);
        }
    </script>

    <!-- jquery vendor -->
    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{asset('assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->

    <!-- bootstrap -->

    <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/pdfmake.min.j')}}s"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/datatables-init.js')}}"></script>
</body>

</html>