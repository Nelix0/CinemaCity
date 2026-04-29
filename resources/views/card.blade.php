@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-4">
    <img src="../public/{{$card->img}}" class="img-fluid rounded shadow-sm" style="height: 450px;">
</div>
    <div class="col-md-8">

        <h2 class="mb-3">{{$card->name}}</h2>

        <p>Жанр: <strong>{{$card->genre}}</strong></p>
        <p>Страна: <strong>{{$card->country}}</strong></p>
        <p>Возраст: <strong>{{$card->age_rating}}+</strong></p>
        <p>Цена: <strong>{{$card->price}} ₽</strong></p>

        <hr>

        <p>{{$card->description}}</p>

    </div>
</div>
<div class="mt-5">

    <h5 class="mb-3">Выберите сеанс:</h5>
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

@foreach($sessions->groupBy('date') as $date => $items)
    <p class="mb-2"><strong>{{$date}}</strong></p>
    <div class="d-flex gap-2 flex-wrap mb-3">
        @foreach($items as $s)
        <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">{{$s->time}}<br>{{$card->price}} ₽</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form method="POST" action="/buy">
                            @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{$card->name}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="row row-cols-5 g-1">

                                @for($i = 1; $i <= 50; $i++)
                                    <div class="col">
                                    <div class="form-check d-inline-block">
                                        <input type="hidden" name="session_id" value="{{$s->id}}">
                                        <input class="btn-check seat" type="checkbox" name="seats[]" value="{{$i}}" id="seat{{$i}}">
                                        <label class="btn btn-outline-dark d-flex justify-content-center align-items-center " for="seat{{$i}}" style="width: 50px">
                                            {{$i}}
                                        </label>
                                    </div>
                                    </div>
                                @endfor

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button  class="btn btn-dark mt-3">Купить</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection



