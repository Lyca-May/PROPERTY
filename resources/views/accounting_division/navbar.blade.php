<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title>Dashboard &mdash; Stisla</title>

    <link rel="stylesheet" href="{{ asset ('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{asset ('assets/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset ('assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                            class="ion ion-navicon-round"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                            class="ion ion-search"></i></a></li>
            </ul>
            {{-- <div class="search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit"><i class="ion ion-search"></i></button>
            </div> --}}
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                    <i class="ion ion-android-person d-lg-none"></i>
                    <div class="d-sm-none d-lg-inline-block">Welcome, Accounting Division!</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#"  class="dropdown-item has-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ion ion-log-out"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf <!-- CSRF protection -->
                    </form>
                </div>
            </li>
        </ul>
    </nav>


    <script src="{{ asset ('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset ('assets/modules/popper.js') }}"></script>
    <script src="{{asset ('assets/modules/tooltip.js') }}"></script>
    <script src="{{asset ('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset ('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{asset ('assets/modules/scroll-up-bar/assets/scroll-up-bar.min.js') }}"></script>
    <script src="{{asset ('assets/js/sa-functions.js') }}"></script>

    <script src="{{asset ('assets/modules/chart.min.js') }}"></script>
    <script src="{{asset ('assets/modules/summernote/summernote-lite.js') }}"></script>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    label: 'Statistics',
                    data: [460, 458, 330, 502, 430, 610, 488],
                    borderWidth: 2,
                    backgroundColor: 'rgb(87,75,144)',
                    borderColor: 'rgb(87,75,144)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>
    <script src="{{ asset ('assets/js/scripts.js') }}"></script>
    <script src="{{ asset ('assets/js/custom.js') }}"></script>
    {{-- <script src="{{ ('assets/js/demo.js') }}"></script> --}}
</body>

</html>
