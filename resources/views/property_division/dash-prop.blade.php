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
    <link href="{{asset('assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


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
        .custom-alert-container {
        background-color: blue; /* Set the background color */
        border-radius: 10px; /* Adjust the border radius as needed */
    }

    .custom-alert-popup {
        width: 400px; /* Set the width of the modal */
    }

    .custom-alert-title {
        color: white; /* Set the color of the title */
    }

    .custom-alert-button {
        background-color: white; /* Set the background color of the buttons */
        color: blue; /* Set the text color of the buttons */
    }
    </style>
</head>

<body>
   @include('navbar')
   @include('sidebar')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Admin!</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Stock Card</div>
                                        <div class="stat-digit">1,012</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">New Customer</div>
                                        <div class="stat-digit">961</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Projects</div>
                                        <div class="stat-digit">770</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Referral</div>
                                        <div class="stat-digit">2,781</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Fee Collections and Expenses</h4>

                                </div>
                                <div class="card-body">
                                    <div class="ct-bar-chart m-t-30"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">

                                <div class="card-body">
                                    <div class="ct-pie-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card bg-primary">
                                        <div class="weather-widget">
                                            <div id="weather-one" class="weather-one p-22"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="testimonial-widget-one p-17">
                                            <div class="testimonial-widget-one owl-carousel owl-theme">
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title pr" style="text-align: center;">
                                    <h4><strong>STOCK CARD</strong></h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-6 col-form-label">
                                                                Entity Name
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-6 col-form-label">
                                                                Fund Cluster
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">

                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Item:</th>
                                                                        <td>
                                                                            <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                                        </td>
                                                                        <th scope="row">Item Code:</th>
                                                                        <td>
                                                                            <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Description:</th>
                                                                        <td>
                                                                            <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                                        </td>
                                                                        <th scope="row">Re-Order Point</th>
                                                                        <td>
                                                                            <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Unit of Measurement:</th>
                                                                        <td>
                                                                            <input type="text" class="form-control text-line" style="padding-top: 4px; padding-bottom: 4px;" placeholder="">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- /# column -->
            </div>
            <!-- /# row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="card p-0">
                        <div class="stat-widget-three home-widget-three">
                            <div class="stat-icon bg-facebook">
                                <i class="ti-facebook"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-digit">8,268</div>
                                <div class="stat-text">Likes</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-0">
                        <div class="stat-widget-three home-widget-three">
                            <div class="stat-icon bg-youtube">
                                <i class="ti-youtube"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-digit">12,545</div>
                                <div class="stat-text">Subscribes</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-0">
                        <div class="stat-widget-three home-widget-three">
                            <div class="stat-icon bg-twitter">
                                <i class="ti-twitter"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-digit">7,982</div>
                                <div class="stat-text">Tweets</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-0">
                        <div class="stat-widget-three home-widget-three">
                            <div class="stat-icon bg-danger">
                                <i class="ti-linkedin"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-digit">9,658</div>
                                <div class="stat-text">Followers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="year-calendar"></div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-title">
                            <h4>Notice Board </h4>

                        </div>
                        <div class="recent-comment m-t-15">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/avatar/1.jpg" alt="..."></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-primary">Soeng Souy</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                    <p class="comment-date">10 min ago</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/avatar/2.jpg" alt="..."></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-success">Mr. Soeng Souy</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                    <p class="comment-date">1 hour ago</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/avatar/3.jpg" alt="..."></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-danger">Mr. Soeng Souy</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                    <div class="comment-date">Yesterday</div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/avatar/1.jpg" alt="..."></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-primary">Soeng Souy</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                    <p class="comment-date">10 min ago</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/avatar/2.jpg" alt="..."></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-success">Mr. Soeng Souy</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                    <p class="comment-date">1 hour ago</p>
                                </div>
                            </div>
                            <div class="media no-border">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/images/avatar/3.jpg" alt="..."></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-info">Mr. Soeng Souy</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                    <div class="comment-date">Yesterday</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-title">
                            <h4>Timeline</h4>

                        </div>
                        <div class="card-body">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge primary"><i class="fa fa-smile-o"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h5 class="timeline-title">School promote video sharing</h5>
                                        </div>
                                        <div class="timeline-body">
                                            <p>10 minutes ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"><i class="fa fa-sun-o"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h5 class="timeline-title">Ready our school website and online
                                                service</h5>
                                        </div>
                                        <div class="timeline-body">
                                            <p>20 minutes ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h5 class="timeline-title">Routine pubish our website form
                                                10/03/2017 </h5>
                                        </div>
                                        <div class="timeline-body">
                                            <p>30 minutes ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge success"><i class="fa fa-check-circle-o"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h5 class="timeline-title">Principle quotation publish our website
                                            </h5>
                                        </div>
                                        <div class="timeline-body">
                                            <p>15 minutes ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"><i class="fa fa-sun-o"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h5 class="timeline-title">Class schedule publish our website</h5>
                                        </div>
                                        <div class="timeline-body">
                                            <p>20 minutes ago</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
            </div>
            <!-- /# row -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-title">
                            <h4>Task</h4>

                        </div>
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="checkbox"><i></i><span>22,Dec Publish The Final
                                                    Exam Result</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i></i><span>First Jan Start Our
                                                    School</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox"><i></i><span>Recently Our Maganement
                                                    Programme Start</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i></i><span>Check out some
                                                    Popular courses</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>

                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i></i><span>First Jan Start Our
                                                    School</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i></i><span>Connect with one new
                                                    person</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-title pr">
                            <h4>All Expense</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table student-data-table m-t-20">
                                    <thead>
                                        <tr>
                                            <th><label><input type="checkbox" value=""></label>ID</th>
                                            <th>Expense Type</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label><input type="checkbox" value=""></label>#2901</td>
                                            <td>
                                                Salary
                                            </td>
                                            <td>
                                                $2000
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">Paid</span>
                                            </td>
                                            <td>
                                                edumin@gmail.com
                                            </td>
                                            <td>
                                                10/05/2017
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" value=""></label>#2901</td>
                                            <td>
                                                Salary
                                            </td>
                                            <td>
                                                $2000
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>
                                                edumin@gmail.com
                                            </td>
                                            <td>
                                                10/05/2017
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" value=""></label>#2901</td>
                                            <td>
                                                Salary
                                            </td>
                                            <td>
                                                $2000
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">Paid</span>
                                            </td>
                                            <td>
                                                edumin@gmail.com
                                            </td>
                                            <td>
                                                10/05/2017
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" value=""></label>#2901</td>
                                            <td>
                                                Salary
                                            </td>
                                            <td>
                                                $2000
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">Due</span>
                                            </td>
                                            <td>
                                                edumin@gmail.com
                                            </td>
                                            <td>
                                                10/05/2017
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" value=""></label>#2901</td>
                                            <td>
                                                Salary
                                            </td>
                                            <td>
                                                $2000
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">Paid</span>
                                            </td>
                                            <td>
                                                edumin@gmail.com
                                            </td>
                                            <td>
                                                10/05/2017
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>


            @include('footer')
            </section>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Example of using SweetAlert with a rectangle style and blue color
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                customClass: {
                    container: 'custom-alert-container',
                    popup: 'custom-alert-popup',
                    title: 'custom-alert-title',
                    confirmButton: 'custom-alert-button'
                }
            });
        @endif

        @if(session('failed'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('failed') }}',
                customClass: {
                    container: 'custom-alert-container',
                    popup: 'custom-alert-popup',
                    title: 'custom-alert-title',
                    confirmButton: 'custom-alert-button'
                }
            });
        @endif
    </script>


</body>

</html>
