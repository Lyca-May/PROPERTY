<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES UNIT</title>
    <!-- ================= Favicon ================== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <style>
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: auto;
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
                        <div>Dashboard</div>
                    </h1>
                    <div class="row">
                        <div class="col-md-4">
                            <br>
                            <label><b> INVENTORY ITEMS </b> </label>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <label><b> PROPERTY, PLANTS AND EQUIPMENT </b> </label>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <label><b>SEMI - EXPENDABLE PROPERTY</b> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-primary">
                                    <i class="ion ion-person"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Items</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $stockCards }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-primary">
                                    <i class="ion ion-person"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total PPE</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $PPEC }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-danger">
                                    <i class="ion ion-ios-paper-outline"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Semi-Expendable Property</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $sepCards }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <select id="filter-select1" class="form-control">
                                <option value="purchased">Purchased Items</option>
                                <option value="issued">Issued Items</option>
                            </select>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visualization</h4>
                                    <canvas id="myBarChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <select id="filterSelect" class="form-control">
                                <option value="purchased">Purchased PPE</option>
                                <option value="issued">Issued PPE</option>
                                <option value="transferred">Transferred PPE</option>
                                <option value="returned">Returned PPE</option>
                                <option value="disposed">Disposed PPE</option>
                            </select>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visualization</h4>
                                    <div class="chart-container">
                                        <canvas id="ppeChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <select id="filter-select2" class="form-control">
                                <option value="purchased">Purchased SEP</option>
                                <option value="issued">Issued SEP</option>
                                <option value="transferred">Transferred SEP</option>
                                <option value="returned">Returned SEP</option>
                                <option value="disposed">Disposed SEP</option>
                            </select>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visualization</h4>
                                    <div class="chart-container">
                                        <canvas id="sepChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Recent Added Cards</h4>
                                </div>
                                <div class="card-body"> --}}
                                    {{-- @if ($semiCardRecent != null)
                                        <form action="{{ url('/clicked-sep/' . $semiCardRecent->id) }}" method="POST"
                                            id="form-sep">
                                            @csrf
                                            <div class="recent-card" onclick="submitForm('form-sep')">
                                                <p>
                                                    {{ $semiCardRecent->sep_name }} with number
                                                    {{ $semiCardRecent->sep_no }}
                                                    has been added!
                                                </p>
                                            </div>
                                        </form>
                                    @endif --}}
                                    {{-- @if ($stockCardRecent != null)
                                        <form action="{{ url('/clicked-stock-card/' . $stockCardRecent->id) }}"
                                            method="POST" id="form-stock">
                                            @csrf
                                            <div class="recent-card" onclick="submitForm('form-stock')">
                                                <p>
                                                    {{ $stockCardRecent->item_name }} with code
                                                    {{ $stockCardRecent->item_code }} has been added!
                                                </p>
                                            </div>
                                        </form>
                                    @endif --}}
                                    {{-- @if ($propCardRecent != null)
                                        <form action="{{ url('/clicked-property-card/' . $propCardRecent->id) }}"
                                            method="POST" id="form-property">
                                            @csrf
                                            <div class="recent-card" onclick="submitForm('form-property')">
                                                <p>
                                                    {{ $propCardRecent->prop_plant_eq }} with number
                                                    {{ $propCardRecent->prop_no }} has been added!
                                                </p>
                                            </div>
                                        </form>
                                    @endif --}}
                                {{-- </div>
                            </div> --}}

                            <script>
                                function submitForm(formId) {
                                    document.getElementById(formId).submit();
                                }
                            </script>


                        </div>
                        {{-- <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visualization</h4>
                                    <canvas id="myDoughnutChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            </div>

        </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    @include('footer')



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data passed from the controller
            const dataSets = {
                purchased: {
                    labels: @json($purchasePPE->pluck('description')),
                    values: @json($purchasePPE->pluck('total_receipt_qty')),
                    title: 'Purchased PPE'
                },
                issued: {
                    labels: @json($issuedData->pluck('description')),
                    values: @json($issuedData->pluck('total_qty')),
                    title: 'Issued PPE'
                },
                transferred: {
                    labels: @json($transferredData->pluck('description')),
                    values: @json($transferredData->pluck('total_qty')),
                    title: 'Transferred PPE'
                },
                returned: {
                    labels: @json($returnedData->pluck('description')),
                    values: @json($returnedData->pluck('total_qty')),
                    title: 'Returned PPE'
                },
                disposed: {
                    labels: @json($disposedData->pluck('description')),
                    values: @json($disposedData->pluck('total_qty')),
                    title: 'Disposed PPE'
                }
            };

            // Initial data for the chart
            const initialData = dataSets.purchased; // Set initial data to Purchased PPE

            // Create chart
            const ctx = document.getElementById('ppeChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: initialData.labels,
                    datasets: [{
                        label: 'PPE',
                        data: initialData.values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: initialData.title
                        }
                    }
                }
            });

            // Update chart based on selected value
            const selectElement = document.getElementById('filterSelect');
            selectElement.addEventListener('change', function() {
                const selectedValue = selectElement.value;
                const newData = dataSets[selectedValue];

                if (newData) {
                    myChart.data.labels = newData.labels;
                    myChart.data.datasets[0].data = newData.values;
                    myChart.options.plugins.title.text = newData.title;
                    myChart.update();
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data passed from the controller
            const dataSets = {
                purchased: {
                    labels: @json($purchasedSep->pluck('desc')),
                    values: @json($purchasedSep->pluck('total_receipt_qty')),
                    title: 'Purchased SEP'
                },
                issued: {
                    labels: @json($issuedSep->pluck('desc')),
                    values: @json($issuedSep->pluck('total_qty')),
                    title: 'Issued SEP'
                },
                transferred: {
                    labels: @json($transferredSep->pluck('desc')),
                    values: @json($transferredSep->pluck('total_qty')),
                    title: 'Transferred SEP'
                },
                returned: {
                    labels: @json($returnedSep->pluck('desc')),
                    values: @json($returnedSep->pluck('total_qty')),
                    title: 'Returned SEP'
                },
                disposed: {
                    labels: @json($disposedSep->pluck('desc')),
                    values: @json($disposedSep->pluck('total_qty')),
                    title: 'Disposed SEP'
                }
            };

            // Initial data for the chart
            const initialData = dataSets.purchased; // Set initial data to Purchased PPE

            // Create chart
            const ctx = document.getElementById('sepChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: initialData.labels,
                    datasets: [{
                        label: 'SEP',
                        data: initialData.values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: initialData.title
                        }
                    }
                }
            });

            // Update chart based on selected value
            const selectElement = document.getElementById('filter-select2');
            selectElement.addEventListener('change', function() {
                const selectedValue = selectElement.value;
                const newData = dataSets[selectedValue];

                if (newData) {
                    myChart.data.labels = newData.labels;
                    myChart.data.datasets[0].data = newData.values;
                    myChart.options.plugins.title.text = newData.title;
                    myChart.update();
                }
            });
        });
    </script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const purchasedLabels = @json($purchasedSC->pluck('item_name'));
        const purchasedValues = @json($purchasedSC->pluck('total_receipt_qty'));

        const issuedLabels = @json($issuedSC->pluck('item_name'));
        const issuedValues = @json($issuedSC->pluck('total_issue_qty'));

        const dataSets = {
            purchased: {
                labels: purchasedLabels,
                values: purchasedValues,
                title: 'Purchased PPE'
            },
            issued: {
                labels: issuedLabels,
                values: issuedValues,
                title: 'Issued PPE'
            }
        };

        const ctx = document.getElementById('myBarChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: purchasedLabels,
                datasets: [{
                    label: 'Purchased Items',
                    data: purchasedValues,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: ' Purchased Items'
                    }
                }
            }
        });

        const selectElement = document.getElementById('filter-select1');
        selectElement.addEventListener('change', function() {
            const selectedValue = selectElement.value;
            const newData = dataSets[selectedValue];

            if (newData) {
                myChart.data.labels = newData.labels;
                myChart.data.datasets[0].data = newData.values;
                myChart.options.plugins.title.text = newData.title;
                myChart.update();
            }
        });
    });
</script>



    </div>
    </div>
</body>

</html>
