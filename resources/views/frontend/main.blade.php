<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} - {{ $title }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css?v=5.3') }}" />
</head>

<body>
    @include('frontend.templates.quickview')

    @include('frontend.templates.header')
    <main class="main">
    @yield('content')
    </main>
    @include('frontend.templates.footer')

    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/js/main.js') }}?v=5.3"></script>
    <script src="{{ asset('frontend/js/shop.js') }}?v=5.3') }}"></script>
</body>

</html>