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
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{asset('assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


    <style>
        .text-line {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0;
            background-color: transparent;
        }
    </style>
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo">
                        <a>
                            <img src="{{asset('assets/images/accounting.png')}}" alt="" / style="height: 90px; width: 90px;">
                        </a>
                        <div>
                            <span>PROPERTY AND SUPPLIES</span>
                        </div>
                    </div>
                    <li class="label">Main</li>
                    <li><a class="sideba"><i class="ti-home"></i> Dashboard</a></li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Supplies Ledger Cards <span
                        class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="page-login.html">Form</a></li>
                            <li><a href="page-register.html">All</a></li>
                        </ul>
                    </li>
                    {{-- <li><a class="sidebar-sub-toggle" href="#"><i class="ti-layout-grid4-alt"></i> Semi-Expendable Property Cards <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul class="sidebar-dropdown">
                            <li><a href="">Form</a></li>
                            <li><a href="">All</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li><a class="sidebar-sub-toggle" href="#"><i class="ti-layout-grid4-alt"></i> Property, Plants, and Equipment Cards <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul class="sidebar-dropdown">
                            <li><a href="table-basic.html">Form</a></li>
                            <li><a href="">All</a></li>
                            <li><a href="">PPE and PPELC</a></li>
                        </ul>
                    </li>--}}

                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-close"></i> Logout
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf <!-- CSRF protection -->
                    </form>

                </ul>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/lib/preloader/pace.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/calendar-2/pignose.init.js')}}"></script>
    <script src="{{asset('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{asset('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{asset('assets/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <script src="{{asset('assets/js/dashboard2.js')}}"></script>



</body>
</html>
