<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ asset('assets/images/property.jpg') }}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
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
                        <div>
                            <br>
                            <span>
                            <a>
                                <img src="{{ asset('assets/images/pns.png') }}" alt="" /
                                    style="height: 90px; width: 90px;">
                            </a>
                            </span>
                            <br>
                            <br>
                            <span>PROPERTY AND SUPPLIES</span>
                        </div>
                    </div>
                    <li class="label">Main</li>
                    <li><a class="sideba"><i class="ti-home"></i> Dashboard</a></li>


                    <li>
                        <a class="sidebar-sub-toggle" href="#">
                            <i class="ti-layout-grid4-alt"></i> Stock Cards
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul class="sidebar-dropdown">
                            <li><a href="{{ url('/stock-card-form') }}">Form</a></li>
                            <li><a href="{{ url('all-forms') }}">All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle" href="#">
                            <i class="ti-layout-grid4-alt"></i> Semi-Expendable Cards
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul class="sidebar-dropdown">
                            <li><a href="{{ url('/stock-card-form') }}">Form</a></li>
                            <li><a href="{{ url('all-forms') }}">All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle" href="#">
                            <i class="ti-layout-grid4-alt"></i> Property Cards
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul class="sidebar-dropdown">
                            <li><a href="{{ url('/property-card-form') }}">Form</a></li>
                            <li><a href="{{ url('/all-property') }}">All</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/lib/preloader/pace.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/scripts.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/calendar-2/pignose.init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel-init.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/dashboard2.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            // Toggle sidebar dropdown
            $('.sidebar-sub-toggle').click(function(e) {
                e.preventDefault();
                var $dropdown = $(this).next('.sidebar-dropdown');
                if ($dropdown.is(':visible')) {
                    $dropdown.slideUp();
                } else {
                    $('.sidebar-dropdown').slideUp();
                    $dropdown.slideDown();
                }
            });
        });
    </script>

</body>

</html>
