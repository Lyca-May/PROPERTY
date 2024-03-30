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
                                <a type="submit" class="btn btn-danger" href="{{url('/all-forms')}}">BACK</a>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <!-- Card content for the first column -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <!-- Card content for the second column -->
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