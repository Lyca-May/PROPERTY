<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES UNIT</title>
    <!-- ================= Favicon ================== -->
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
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-primary">
                                    <i class="ion ion-person"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Stock Cards</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $stockCards }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-primary">
                                    <i class="ion ion-person"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Stock Ledger Cards</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $stockLedgerCards }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-danger">
                                    <i class="ion ion-ios-paper-outline"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total PPEC</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $PPEC }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-danger">
                                    <i class="ion ion-ios-paper-outline"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total PPELC</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $PPELC }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-warning">
                                    <i class="ion ion-paper-airplane"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>TOTAL Semi-Expendable Cards</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $sepCards }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card card-sm-3">
                                <div class="card-icon bg-warning">
                                    <i class="ion ion-paper-airplane"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>TOTAL Semi-Expendable Ledger Cards</h4>
                                    </div>
                                    <div class="card-body">
                                        1,201
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Recent Added Cards</h4>
                                </div>
                                <div class="card-body">
                                    @if ($semiCardRecent != null)
                                        <form action="{{ url('/clicked-sep/' . $semiCardRecent->id) }}" method="POST" id="form-sep">
                                            @csrf
                                            <div class="recent-card" onclick="submitForm('form-sep')">
                                                <p>
                                                    {{ $semiCardRecent->sep_name }} with number {{ $semiCardRecent->sep_no }} has been added!
                                                </p>
                                            </div>
                                        </form>
                                    @endif
                                    @if ($stockCardRecent != null)
                                        <form action="{{ url('/clicked-stock-card/' . $stockCardRecent->id) }}" method="POST" id="form-stock">
                                            @csrf
                                            <div class="recent-card" onclick="submitForm('form-stock')">
                                                <p>
                                                    {{ $stockCardRecent->item_name }} with code {{ $stockCardRecent->item_code }} has been added!
                                                </p>
                                            </div>
                                        </form>
                                    @endif
                                    @if ($propCardRecent != null)
                                        <form action="{{ url('/clicked-property-card/' . $propCardRecent->id) }}" method="POST" id="form-property">
                                            @csrf
                                            <div class="recent-card" onclick="submitForm('form-property')">
                                                <p>
                                                    {{ $propCardRecent->prop_plant_eq }} with number {{ $propCardRecent->prop_no }} has been added!
                                                </p>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <script>
                                function submitForm(formId) {
                                    document.getElementById(formId).submit();
                                }
                            </script>


                        </div>
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visualization</h4>
                                    <canvas id="myDoughnutChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            // Usage
            const labels = ['Stock Cards', 'Stock Ledger Cards', 'PPEC', 'PPELC', 'Semi-Expendable'];
            const counts = [<?php echo $stockCards; ?>, <?php echo $stockLedgerCards; ?>, <?php echo $PPEC; ?>, <?php echo $PPELC; ?>,
                <?php echo $sepCards; ?>
            ];

            createDoughnutChart(labels, counts);

            function createDoughnutChart(labels, counts) {
                const backgroundColors = [
                    'rgba(255, 99, 132, 0.7)', // Red
                    'rgba(54, 162, 235, 0.7)', // Blue
                    'rgba(255, 206, 86, 0.7)', // Yellow
                    'rgba(75, 192, 192, 0.7)', // Cyan
                    'rgba(153, 102, 255, 0.7)' // Purple
                ];

                const borderColor = [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ];


                const config = {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Count',
                            data: counts,
                            backgroundColor: backgroundColors,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                position: 'right',
                            },
                            title: {
                                display: true,
                                text: 'Card Counts'
                            }
                        }
                    }
                };

                const ctx = document.getElementById('myDoughnutChart').getContext('2d');
                new Chart(ctx, config);
            }
        </script>

    </div>
    </div>
</body>

</html>
