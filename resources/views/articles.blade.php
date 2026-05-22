@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Полезные статьи</h1>


        <div class="container py-5">

            @foreach($articles as $article)

                <div>
                    <h2 class="fw-bold mb-3 text-primary" >{{ $article->title }}</h2>

                    <p style="text-align: justify;">
                        {{ $article->text }}
                    </p>
                </div>

            @endforeach

        </div>
    </div>
@endsection


