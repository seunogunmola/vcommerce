<!DOCTYPE html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{ env('APP_NAME') }} - @yield('title')</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon"
            href="{{ asset('frontend/imgs/theme/favicon.svg') }}" />
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

        <!-- TOASTER  -->
        <!-- CSS  -->
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <!-- CSS  -->
        <!--NOTIFICATION TOASTER-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
        </script>
        @if(Session::has('message'))
            <script>
                var type = "{{ Session::get('alert','info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }

            </script>
        @endif
        <!-- TOASTER  -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $(function () {
                $(document).on('click', '#logout', function (e) {
                    e.preventDefault();
                    var link = $(this).attr("href");


                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Are You Sure You want to Logout?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Logged Out!',
                                'You Logged Out Successfully',
                                'success'
                            )
                        }
                    })


                });

            });

        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#photo').change(function (event) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $('#showImage').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(event.target.files[0]);
                });
            });

        </script>
    </body>

</html>
