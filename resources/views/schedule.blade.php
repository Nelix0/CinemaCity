@extends('layouts.app')
@section('content')

{{--<div id="dateCarousel" class="carousel slide mb-5">--}}
{{--    <div class="carousel-inner">--}}


{{--        <div class="carousel-item active">--}}
{{--            <div class="d-flex justify-content-center  gap-1">--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="carousel-item">--}}
{{--            <div class="d-flex justify-content-center  gap-1">--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср3</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--                <button class="btn btn-sm btn-outline-dark">14 Апреля <br> Ср</button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}



{{--    <button class="carousel-control-prev" type="button" data-bs-target="#dateCarousel" data-bs-slide="prev">--}}
{{--        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>--}}
{{--    </button>--}}

{{--    <button class="carousel-control-next" type="button" data-bs-target="#dateCarousel" data-bs-slide="next">--}}
{{--        <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>--}}
{{--    </button>--}}
{{--</div>--}}



@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

<h1 class=" text-center mb-5">Расписание</h1>


<div class=" g-4 mt-3 ">

    <div id="top" class="mb-4 text-center">
        @foreach($sessions->sortBy('date')->pluck('date')->unique() as $date)
            <a href="#day{{$date}}" class="btn btn-sm btn-dark rounded-pill px-4 m-1">{{$date}}</a>
        @endforeach
    </div>

    @foreach($sessions->groupBy('date') as $date => $items)

        <div id="day{{$date}}" class="mt-5">
            <h4 class="text-center mb-3">{{$date}}</h4>

            @foreach($array as $film)

                @foreach($items->where('film_id', $film->id) as $s)

                    <div class="card mb-3 shadow-sm">
                        <div class="row g-0">

                            <div class="col-md-3">
                                <img src="../public/{{$film->img}}" class="img-fluid rounded-start" style="height:500px; object-fit:cover;">
                            </div>

                            <div class="col-md-9">

                                <div class="card-body">
                                    <h4 class="card-title">{{$film->name}}</h4>
                                    <p class="mb-1">Жанр: <strong>{{$film->genre}}</strong></p>
                                    <p class="mb-1">Страна производства: <strong>{{$film->country}}</strong></p>
                                    <p class="mb-0"><strong>{{$film->age_rating}}+</strong></p>
                                </div>

                                <div class="mt-5 ms-3">

                                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#buyModal{{$s->id}}">
                                        {{$s->time}}<br>{{$film->price}} ₽
                                    </button>

                                </div>

                            </div>

                        </div>
                    </div>

                @endforeach

            @endforeach

        </div>

    @endforeach

    <a href="#top" class="btn btn-dark position-fixed bottom-0  end-0 m-3">Наверх</a>
</div>
@foreach($sessions as $s)

    <div class="modal fade" id="buyModal{{$s->id}}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form method="POST" action="/buy">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Покупка билета</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="session_id" value="{{$s->id}}">

                        <div class="row row-cols-5 g-1">

                            @for($i = 1; $i <= 50; $i++)
                                <div class="col">
                                    <input class="btn-check seat" type="checkbox" name="seats[]" value="{{$i}}" id="seat{{$s->id}}_{{$i}}">

                                    <label class="btn btn-outline-dark d-flex justify-content-center align-items-center" for="seat{{$s->id}}_{{$i}}" style="width:50px">
                                        {{$i}}
                                    </label>
                                </div>
                            @endfor

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-dark">Купить</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endforeach


@endsection
