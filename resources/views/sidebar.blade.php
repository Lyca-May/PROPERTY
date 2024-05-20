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
                <li class="menu-header">DASHBOARD</li>
                <li class="active">
                    <a href="{{ url ('/dash-prop')}}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
                </li>

                <li class="menu-header">CARDS</li>
                <li>
                    <a href="{{ url ('/all-forms')}}"><i class="ion ion-clipboard"></i><span>Stock Cards</span></a>
                </li>
                <li>
                    <a href="{{ url ('/all-property')}}"><i class="ion ion-ios-location-outline"></i><span>
                            Property Cards</span></a>
                </li>
                <li>
                    <a href="{{ url ('/all-semi-expandable') }}"><i class="ion ion-stats-bars"></i><span>Semi-Expendable Cards</span></a>
                </li>


                {{-- <li class="menu-header">ACCOUNTABILITY</li> --}}
                {{-- <li>
                    <a href="{{ url ('/all-users') }}"><i class="ion ion-person"></i><span>Users</span></a>
                </li> --}}
            </ul>
        </aside>
    </div>
</body>

</html>
