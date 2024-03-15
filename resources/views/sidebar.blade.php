<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title>Dashboard &mdash; Stisla</title>

</head>

<body>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html"><small><b>Property & Supplies Unit</b></small></a>
            </div>
            <div class="sidebar-user" style="align-items: center; justify-content: center; display: flex;">
                <div class="sidebar-user-picture">
                    <img alt="image" src="{{ asset('assets/img/BFAR_LOGO.png') }}">
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="active">
                    <a href="index.html"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
                </li>

                <li class="menu-header">Components</li>

                {{-- <li>
                    <a href="#" class="has-dropdown"><i class="ion ion-flag"></i><span>Icons</span></a>
                    <ul class="menu-dropdown">
                        <li><a href="ion-icons.html"><i class="ion ion-ios-circle-outline"></i> Ion Icons</a>
                        </li>
                        <li><a href="fontawesome.html"><i class="ion ion-ios-circle-outline"></i> Font
                                Awesome</a></li>
                        <li><a href="flag.html"><i class="ion ion-ios-circle-outline"></i> Flag</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ url ('/all-forms')}}"><i class="ion ion-clipboard"></i><span>Stock Cards</span></a>
                </li>
                <li>
                    <a href="chartjs.html"><i class="ion ion-stats-bars"></i><span>Semi-Expendable Cards</span></a>
                </li>
                <li>
                    <a href="simple.html"><i class="ion ion-ios-location-outline"></i><span>
                            Property Cards</span></a>
                </li>

                <li class="menu-header">More</li>
                <li>
                    <a href="#" class="has-dropdown"><i class="ion ion-ios-nutrition"></i> Click Me</a>
                    <ul class="menu-dropdown">
                        <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Menu 1</a></li>
                        <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i>
                                Menu 2</a>
                            <ul class="menu-dropdown">
                                <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu
                                        1</a></li>
                                <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu
                                        2</a></li>
                                <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i>
                                        Child Menu 3</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child
                                                Menu 1</a></li>
                                        <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child
                                                Menu 2</a></li>
                                        <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child
                                                Menu 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="ion ion-ios-circle-outline"></i> Child Menu
                                        4</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>
</body>

</html>
