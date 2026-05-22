<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dresscode') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet">
</head>
<body  class="min-vh-100 flex-column d-flex">
<div id="app">
    <header class="bg-black py-3">
        <div class="container">

            <ul class="nav justify-content-center">

                <li class="nav-item">
                    <a href="/admin/products" class="nav-link text-white">Продукты</a>
                </li>

                <li class="nav-item">
                    <a href="/admin/sales" class="nav-link text-white">Акции</a>
                </li>

                <li class="nav-item">
                    <a href="/admin/feedbacksAdmin" class="nav-link text-white">Отзывы</a>
                </li>

                <li class="nav-item">
                    <a href="/admin/articlesAdmin" class="nav-link text-white">Полезные статьи</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link text-white">Личный кабинет</a>
                </li>


            </ul>

        </div>
    </header>

    <main class="py-4 flex-grow-1">
        @yield('content')
    </main>
</div>
</body>
<div class="footer mt-auto">
    @include('layouts.footer')
</div>
</html>
