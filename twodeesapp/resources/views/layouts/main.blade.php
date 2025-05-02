<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>TwoDees - @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <link href="{{ asset('css/show-password-toggle.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
    </head>
    <body>
        <div class="py-4 px-4 text-faded text-end">
            @if(auth()->check())
                <a href="{{ route('profile.index', auth()->user()->id) }}"><img src="{{ (file_exists(auth()->user()->profile_picture)) ? asset(auth()->user()->profile_picture) : 'https://images.nightcafe.studio//assets/profile.png?tr=w-1600,c-at_max'}}" class="rounded-circle shadow-4" style="width: 50px; height: 50px;" alt="Avatar"/></a>
                <span class="px-2" id="current_user">{{ auth()->user()->name }} {{ auth()->user()->surname }} ({{ auth()->user()->username }})</span>
            @endif
        </div>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Exploring Legions, One Lore At A Time</span>
                <span class="site-heading-lower">TwoDees</span>
            </h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="{{ route('items.index') }}">TwoDees</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                                href="{{ route('/') }}">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                                href="{{ route('navigation.about') }}">About</a></li>
                        @if(auth()->check())
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('items.index') }}">Items</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('categories.index') }}">Categories</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                                    href="{{ route('authentication.logout') }}">Logout</a></li>
                        @else
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                                    href="{{ route('authentication.login') }}">Login</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                                    href="{{ route('authentication.register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="footer text-faded text-center py-5">
            <div class="container">
                @include('footer._platforms')
                <p class="m-0 small">&copy; <?= date('Y') ?> TwoDees by Mandy Farrugia | All rights reserved</p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/custom_frontend.js') }}"></script>
    </body>
</html>