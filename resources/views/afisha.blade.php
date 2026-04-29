@extends('layouts.app')

@section('content')
<h1 class=" text-center mb-4">Афиша</h1>

<ul class="nav nav-tabs justify-content-center mb-4 gap-2" id="AfishaTab" style="border: none">
    <li class="nav-item">
        <button class="btn btn-outline-dark active" aria-current="page" href="#" data-bs-toggle="tab" data-bs-target="#now">В прокате</button>
    </li>
    <li class="nav-item">
        <button class="btn btn-outline-dark" href="#" data-bs-toggle="tab" data-bs-target="#later">Скоро в кино</button>
    </li>

</ul>
<div class="tab-content">

    <div class="tab-pane fade show active" id="now">

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($array as $film)
        @if($film->status == "now")
        <div class="col">
            <a href="{{route('card', ['id'=>$film->id])}}">

            <div class="card h-100">
                <img src="../public/{{$film->img}}" class="card-img-top" alt="..." height="450px">
            </div>
            </a>

        </div>
            @endif
        @endforeach

    </div>
</div>
    </div>

    <div class="tab-pane fade " id="later">
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($array as $film)
                    @if($film->status == "later")
                        <div class="col">
                            <a href="{{route('card', ['id'=>$film->id])}}">
                            <div class="card h-100">
                                <img src="../public/{{$film->img}}" class="card-img-top" alt="..." height="450px">

                            </div>
                            </a>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
