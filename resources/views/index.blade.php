@extends('layouts.app')

@section('content')



    <div class="container mt-4 ">


        <div class="p-5 rounded position-relative text-light"
             style="background: url({{asset('public/assets/img/cinema4.jpg')}}) center/cover no-repeat;">

            <div style="position:absolute; inset:0; background:rgba(0,0,0,0.75); border-radius:10px;"></div>

            <div class="position-relative text-center py-5">
                <h1 class="display-3 fw-bold">CinemaCity</h1>
                <p class="lead">Погрузись в кино, которое ты чувствуешь</p>

                <a href="{{route('schedule')}}" class="btn btn-light btn-lg mt-3">
                    Выбрать сеанс
                </a>
            </div>
        </div>


        <div class="row text-center mt-4 text-light justify-content-center">


            <div class="col-md-3">
                <div class="bg-dark p-3 rounded shadow-sm">
                    <h5>Время работы</h5>
                    <p>Ежедневно с 10:00 до 02:00</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-dark p-3 rounded shadow-sm">
                    <h5>Адрес</h5>
                    <p>г. Москва, ул. Примерная, 10</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-dark p-3 rounded shadow-sm">
                    <h5>Рейтинг</h5>
                    <p>9.2 / 10</p>
                </div>
            </div>

        </div>


        <div class="mt-5 text-center">
            <h2>О кинотеатре</h2>
            <p class="text-muted">
                CinemaCity - это современный кинотеатр с атмосферой полного погружения.
                Мы создаём эмоции, а не просто показываем фильмы.
            </p>
        </div>


        <div class="mt-5">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Сейчас в прокате</h3>
                <a href="{{route('afisha')}}" class="btn btn-dark">
                    Смотреть все
                </a>
            </div>

            <div class="row row-cols-2 row-cols-md-4 g-4">

                @foreach($now as $film)
                    @if($film->status == 'now')

                        <div class="col">

                            <a href="{{route('card', $film->id)}}" class="text-decoration-none">

                                <div class="card ">

                                    <img src="../public/{{$film->img}}" class="card-img-top" style="height:400px; object-fit:cover;">

                                </div>

                            </a>

                        </div>

                    @endif
                @endforeach



            </div>
        </div>


        <div class="mt-5">

            <h3 class="mb-3">Скоро в прокате</h3>

            <div class="row row-cols-2 row-cols-md-4 g-4">

                @foreach($later as $film)
                    @if($film->status == 'later')

                        <div class="col">

                            <a href="{{route('card', $film->id)}}" class="text-decoration-none">

                                <div class="card ">

                                    <img src="../public/{{$film->img}}" class="card-img-top" style="height:400px; object-fit:cover;">

                                </div>

                            </a>

                        </div>

                    @endif
                @endforeach

            </div>

        </div>


    </div>
@endsection
