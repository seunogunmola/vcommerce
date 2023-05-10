<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{ asset('backend/images/favicon-32x32.png') }}"
            type="image/png" />
        <!--plugins-->
        <link href="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}"
            rel="stylesheet" />
        <link href="{{ asset('backend/plugins/simplebar/css/simplebar.css') }}"
            rel="stylesheet" />
        <link
            href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
            rel="stylesheet" />
        <link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css') }}"
            rel="stylesheet" />
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
        <link
            href="{{ asset('backend/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
            rel="stylesheet" />
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
        <!-- Bootstrap JS -->
        <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
        <!--plugins-->
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
        <script
            src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}">
        </script>
        <script src="{{ asset('backend/plugins/chartjs/js/Chart.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}">
        </script>
        <script
            src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}">
        </script>
        <script
            src="{{ asset('backend/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}">
        </script>
        <script src="{{ asset('backend/plugins/sparkline-charts/jquery.sparkline.min.js') }}">
        </script>
        <script src="{{ asset('backend/plugins/jquery-knob/excanvas.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }} ">
        </script>
        <script
            src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }}">
        </script>
        <script>
            $(function () {
                $(".knob").knob();
            });

        </script>
        <script src="{{ asset('backend/js/index.js') }}"></script>
        <!--app JS-->
        <script src="{{ asset('backend/js/app.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });

        </script>
        <script>
            $(document).ready(function () {
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });

                table.buttons().container()
                    .appendTo('#example2_wrapper .col-md-6:eq(0)');
            });

        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $(function () {
                $(document).on('click', '#delete', function (e) {
                    e.preventDefault();
                    var link = $(this).attr("href");


                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete This Data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                });

            });
        </script>
        
        <script>
            $(document).ready(function(){
                $('#image').change(function(event){
                    var reader = new FileReader();
                    reader.onload = function(event){
                        $('#showImage').attr('src',event.target.result);
                    }
                    reader.readAsDataURL(event.target.files[0]);
                });
            });
        </script>        
    </body>

</html>
