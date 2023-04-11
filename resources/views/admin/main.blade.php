<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{ asset('backend/images/favicon-32x32.png') }}" type="image/png" />
        <!--plugins-->
        <link href="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
        <!-- loader-->
        <link href="{{ asset('backend/css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('backend/js/pace.min.js') }}"></script>
        <!-- Bootstrap CSS -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">
        <!-- Theme Style CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/dark-theme.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/css/semi-dark.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/css/header-colors.css') }}" />
        <title>{{ $title }} - {{ env('APP_NAME') }} {{ env('APP_VERSION') }}</title>
    </head>

    <body>
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            @include('admin.templates.sidebar')
            <!--end sidebar wrapper -->
            <!--start header -->
            @include('admin.templates.header')
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                @yield('content')
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">{{ env('APP_NAME') }} Copyright © 2021. All right reserved.</p>
            </footer>
        </div>
        <!--end wrapper-->


        <!-- Bootstrap JS -->
        <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
        <!--plugins-->
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('backend/plugins/chartjs/js/Chart.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-knob/excanvas.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.js') }}"></script>
        <script>
            $(function () {
                $(".knob").knob();
            });
        </script>
        <script src="{{ asset('backend/js/index.js') }}"></script>
        <!--app JS-->
        <script src="{{ asset('backend/js/app.js') }}"></script>
    </body>

</html>