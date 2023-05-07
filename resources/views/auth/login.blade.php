@php
    $title = "Login"
@endphp
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
        <link rel="shortcut icon" type="image/x-icon"
            href="{{ asset('frontend/imgs/theme/favicon.svg') }}" />
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/css/main.css?v=5.3') }}" />
    </head>

    <body>
        <!-- Header  -->
        @include('frontend.templates.header')

        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Pages <span></span> My Account
                    </div>
                </div>
            </div>
            <div class="page-content pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                            <div class="row">
                                <div class="col-lg-6 pr-30 d-none d-lg-block">
                                    <img class="border-radius-15"
                                        src="{{ asset('frontend/imgs/page/login-1.png') }}"
                                        alt="" />
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <div class="login_wrap widget-taber-content background-white">
                                        <div class="padding_eight_all bg-white">
                                            <div class="heading_s1">
                                                <h1 class="mb-5">Login</h1>
                                                <p class="mb-30">Don't have an account? <a
                                                        href="{{ route('register') }}">Create here</a></p>
                                            </div>
                                        <!-- All VALIDATION ERRORS -->
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form method="post" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" required="" name="email" id="email"
                                                        placeholder="Username or Email *" />
                                                </div>
                                                <div class="form-group">
                                                    <input required="" type="password" name="password"
                                                        placeholder="Your password *" />
                                                </div>
                                                <div class="login_footer form-group mb-50">
                                                    <div class="chek-form">
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="checkbox" id="exampleCheckbox1" value="" />
                                                            <label class="form-check-label"
                                                                for="exampleCheckbox1"><span>Remember me</span></label>
                                                        </div>
                                                    </div>
                                                    <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-heading btn-block hover-up"
                                                        name="login">Log in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer  -->
        @include('frontend.templates.footer')
    </body>

</html>
