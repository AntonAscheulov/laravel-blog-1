<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Look - Photo Gallery</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="instyle, fashion, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="/images/favicon.ico" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="/css/front.css">

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- header section -->
<header class="header-section">
    <div class="header-warp">
        <a href="{{route('index')}}" class="site-logo">
            <img src="/images/logo.png" alt="">
        </a>
        <ul class="main-menu">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('artists')}}">Artists</a></li>
            <li><a href="{{route('exhibitions')}}">Exhibitions</a></li>
            <li><a href="{{route('portfolios')}}">Portfolios</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li><a class="text-info" href="{{route('profile')}}">My Profile</a></li>
                <li><a class="text-info" href="{{route('logout')}}">Logout</a></li>
            @else
                <li><a class="text-info" href="{{route('registerForm')}}">Register</a></li>
                <li><a class="text-info" href="{{route('loginForm')}}">Login</a></li>
            @endif
        </ul>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-error">
        {{ Session::get('error') }}
        @php
            Session::forget('error');
        @endphp
    @endif
</header>

<!--main content start-->
@yield('content')
<!-- end main content-->

<!--footer start-->
<footer class="footer-section spad">
    <div class="sp-container">
        <div class="row m-0">
            <div class="col-lg-4 footer-text">
                <h2>Get in touch</h2>
                <p>Pellentesque dictum nisl in nibh dictum volutpat nec a quam. Vivamus suscipit nisl quis nulla
                    pretium, vitae ornare leo sollic itudin. Aenean quis velit pulvinar, pellentesque neque vel, laoreet
                    orci. Suspendisse potenti. </p>
            </div>
            <div class="col-lg-8">
                <form class="contact-form" method="post" action="{{route('storeContactForm')}}">
                    <div class="row">
                        @csrf
                        <div class="col-lg-4">
                            <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="email" placeholder="Your Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <textarea name="message" placeholder="Message">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                            <button class="site-btn sb-light" type="submit">send message <img
                                    src="/images/icons/arrow-right-white.png" alt=""></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>
<!-- js files -->
<script src="/js/front.js"></script>
</body>
</html>
