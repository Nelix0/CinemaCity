@extends('layouts.app')
@section('content')
    @auth()
    <h2 class="text-center mb-5">Аккаунт</h2>


    <div class="row justify-content-center">

        <div class="col-md-5">



                <div class="card-body text-center">


                    <div class="mb-4">
                        <img src="{{asset('/public/assets/img/icon.jpg')}}" class="rounded-circle" width="110" height="110">
                    </div>


                    <h4 class="mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-4">{{ Auth::user()->email }}</p>


                    <div class="d-grid gap-2">


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-dark">
                                Выйти
                            </button>
                        </form>

                    </div>



            </div>

        </div>
    </div>
    <div class="mt-5">
        <h3 class="text-center mb-4">Ваши билеты</h3>

        <div class="row justify-content-center">

            @foreach($tickets as $ticket)

                <div class="col-md-5 col-lg-5 mb-3">

                    <div class="card" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../public/{{$ticket->img}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Билет</h5>
                                    <p class="card-text">Фильм: <b>{{$ticket->film_name}}</b></p>
                                    <p class="card-text">Место: <b>{{$ticket->seat}}</b></p>
                                    <p class="card-text">Начало: <b>{{$ticket->time}}</b></p>
                                    <p class="card-text">Дата: <b>{{$ticket->date}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            @endforeach

        </div>
    </div>


    @else

        <div class="alert alert-warning">
            Вы не авторизованы.
            <a href="{{ route('login') }}">Войти</a> или
            <a href="{{ route('register') }}">Зарегистрироваться</a>
        </div>
    @endauth
@endsection
