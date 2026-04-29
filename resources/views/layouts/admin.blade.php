<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans+Mono:ital,wght@0,400..700;1,400..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet">

</head>
<body>

<div id="app">

    <nav class="navbar navbar-expand-lg bg-black navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">CinemaCity</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('admin.films')}}">Фильмы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sessions')}}">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Аккаунт</a>
                    </li>



                </ul>

            </div>
        </div>
    </nav>

    <main class="container mt-5">
        @yield('content')
    </main>

</div>
</body>
<div class="footer mt-auto">
    @include('layouts.footer')
</div>
</html>
