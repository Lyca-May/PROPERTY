<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View PPELC | ACCOUNTING DIVISION</title>


    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lg2h+7fH4FG/D9xPZv94f4jeDmhgWxVxs7g2agQF7uYUgMNHmz4vkq0CIGsYqUZkR9Tf7fDcDX5XdLnq6C9ulA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <style>
        /* Make table responsive */
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
            @include('accounting_division.navbar')
            @include('accounting_division.sidebar')

            <div class="main-content">
                <section class="section">
                    <h1 class="section-header">
                        <div>PPELC | Overview</div>
                    </h1>
                    <div class="row">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3"
                                        role="tab" aria-controls="home" aria-selected="true">All Cards</a>
                                </li>
                                <!-- {{-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3"
                                        role="tab" aria-controls="profile" aria-selected="false">New Form</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                        role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li> --}} -->
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    <!-- {{-- <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <a href="{{ url('/property-card-form') }}" class="card">
                                                    <div class="card-body text-center" style="font-size: 20px">+ Add new property card
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}} -->
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
                                                            {{ $prop_cards->entity_name }}</h3>
                                                        <h3 class="card-title">FUND CLUSTERE:
                                                            {{ $prop_cards->fund_cluster }}</h3>
                                                        <h3 class="card-text small">NAME:
                                                            {{ $prop_cards->prop_plant_eq }}</h3>
                                                        <p class="card-text small">Property No/Object Account Code:
                                                            {{ $prop_cards->obj_acc_code }}</p>
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
                                                    <!-- Added modal-custom-width class -->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editItemModalLabel">View or Edit
                                                                PPELC</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('/edit-ppel-card/' . $prop_cards->id) }}"
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
                                                                                            value="{{ $prop_cards->entity_name }}"
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
                                                                                            value="{{ $prop_cards->fund_cluster }}"
                                                                                            readonly>
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
                                                                                                    Property,Plant &
                                                                                                    Equipment:</th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="prop_plant_eq"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $prop_cards->prop_plant_eq }}"
                                                                                                        readonly>
                                                                                                    @error('prop_plant_eq')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <th scope="row">
                                                                                                    Object Account Code:
                                                                                                </th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="obj_acc_code"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $prop_cards->obj_acc_code }}"">
                                                                                                    @error('obj_acc_code')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <th scope="row">Rate
                                                                                                    of Depreciation:
                                                                                                </th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="rate_of_dep"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $prop_cards->rate_of_dep }}">
                                                                                                    @error('rate_of_dep')
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
                                                                                                        value="{{ $prop_cards->description }}"
                                                                                                        readonly>
                                                                                                    @error('description')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <th scope="row">
                                                                                                    Estimated Useful
                                                                                                    Life:
                                                                                                </th>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="est_useful_life"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $prop_cards->est_useful_life }}">
                                                                                                    @error('est_useful_life')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
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
                                                                                                    colspan="2"
                                                                                                    style="text-align: center;">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="2"
                                                                                                    style="text-align: center;">
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    colspan="2"
                                                                                                    style="text-align: center;">
                                                                                                    REPAIR HISTORY</th>
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
                                                                                                    QTY</th>
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
                                                                                                    ACCUMULATED
                                                                                                    DEPRECIATION</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ACCUMULATED
                                                                                                    IMAPAIRMENT LOSSES
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ISSUE/TRANSFERS/
                                                                                                    <br>ADJUSTMENT/S
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    ADJUSTED COST</th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    NATURE OF REPAIR
                                                                                                </th>
                                                                                                <th scope="col"
                                                                                                    style="text-align: center;">
                                                                                                    AMOUNT
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
                                                                                                        value="{{ $prop_cards->date }}"
                                                                                                        readonly>
                                                                                                    @error('date')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="reference" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="@error('reference') {{ $message }} @enderror"
                                                                                                        readonly>{{ $prop_cards->reference }}</textarea>
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
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $prop_cards->receipt_qty }}"
                                                                                                        placeholder=""
                                                                                                        readonly>
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
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        value="{{ $prop_cards->receipt_unitcost }}"
                                                                                                        placeholder=""
                                                                                                        readonly>
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
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $prop_cards->receipt_totalcost }}">
                                                                                                    @error('receipt_totalcost')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="accumulated_dep"
                                                                                                        id="issue_qty"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $prop_cards->accumulated_dep }}">
                                                                                                    @error('issue_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="accumulated_impairment_losses"
                                                                                                        id="issue_office_officer"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $prop_cards->accumulated_impairment_losses }}">
                                                                                                    @error('issue_office_officer')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="issue_transfers_adjustments"
                                                                                                        id=""
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $prop_cards->issue_transfers_adjustments }}">
                                                                                                    @error('bal_qty')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="adjusted_code"
                                                                                                        class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;"
                                                                                                        placeholder=""
                                                                                                        value="{{ $prop_cards->adjusted_code }}">
                                                                                                    @error('adjusted_code')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </td>
                                                                                                <td>
                                                                                                    <textarea type="text" name="repair_nature" class="form-control text-line"
                                                                                                        style="padding-top: 4px; padding-bottom: 4px;" placeholder="">{{ $prop_cards->repair_nature }}</textarea>
                                                                                                    @error('repair_nature')
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
                                                                                                        readonly></input>
                                                                                                    @error('repair_amount')
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
                                                                <div class="modal-footer">
                                                                    <div class="col-md-6 text-right">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                            <button type="button" onclick="navigateToPrintablePage()" class="btn btn-success ">Preview</button>

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile3" role="tabpanel"
                                    aria-labelledby="profile-tab3">
                                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur
                                    est lobortis
                                    quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis
                                    iaculis tellus.
                                    Etiam ac vehicula eros, pharetra consectetur dui.
                                </div>
                                <div class="tab-pane fade" id="contact3" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula
                                    massa,
                                    gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem
                                    interdum
                                    molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                                </div>

                            </div>
                        </div>
                    </div>

            </div>
            </section>
        </div>


          <!-- Bootstrap JavaScript and jQuery -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

        <!-- Modal -->

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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        @if (session('failed'))
            <script>
                Swal.fire({
                    icon: 'failed',
                    title: 'failed!',
                    text: '{{ session('failed') }}',
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
            // Function to navigate to the printable page
            function navigateToPrintablePage() {
                // Assuming 'prop_cards_id' is the parameter to be passed
                var prop_cards_id = '{{ $prop_cards->id }}';
                // Navigate to the printable page
                window.location.href = '/printable-prop-pageAcc/' + prop_cards_id;
            }
        </script>
        {{-- Footer --}}
        @include('footer')

    </div>
    </div>
</body>

</html>
