<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("/admin_panel/assets/img/apple-icon.png")}}">
    <link rel="icon" type="image/png" href="{{asset("/admin_panel/assets/img/favicon.png")}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
      Admin Panel
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link crossorigin="anonymous" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- fontIconPicker core CSS -->
    <link href="{{asset("/admin_panel/assets/icon_picker/css/fontawesome-iconpicker.min.css")}}" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{asset("/admin_panel/assets/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{asset("/admin_panel/assets/css/now-ui-dashboard.css?v=1.1.0")}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset("/admin_panel/assets/demo/demo.css")  }} " rel="stylesheet" />


    <style>
        .sidebar .sidebar-wrapper{
            height: 100vh;
        }
    </style>

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">

        <div class="sidebar-wrapper">
            <ul class="nav">

                <li id="models">
                    <a href="{{ route('allModels') }}">
                        <p>All Models</p>
                    </a>
                </li>

                <li id="markas">
                    <a href="{{ route('allMarkas') }}">
                        <p>All Cars</p>
                    </a>
                </li>



            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav style="background: #f96332 !important" class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div
                style="height: unset; padding-top: unset;"
                class="panel-header panel-header-sm"></div>
        @yield('content')


        <footer class="footer">
            <div class="container-fluid">

            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset("/admin_panel/assets/js/core/jquery.min.js")}}"></script>
<script src="{{asset("/admin_panel/assets/icon_picker/js/fontawesome-iconpicker.js")}}"></script>

<script src="{{asset("/admin_panel/assets/js/core/popper.min.js")}}"></script>
<script src="{{asset("/admin_panel/assets/js/core/bootstrap.min.js")}}"></script>

<script src="{{asset("/admin_panel/assets/js/plugins/perfect-scrollbar.jquery.min.js")}}"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!-- Chart JS -->
<script src="{{asset("/admin_panel/assets/js/plugins/chartjs.min.js")}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset("/admin_panel/assets/js/plugins/bootstrap-notify.js")}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset("/admin_panel/assets/js/now-ui-dashboard.min.js?v=1.1.0")}}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
{{--<script src="{{asset("/admin_panel/assets/demo/demo.js")}}"></script>--}}
@yield('js')

</body>

</html>