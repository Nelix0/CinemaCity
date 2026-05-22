@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <h2 class="fw-bold mb-5 text-center">Отзывы</h2>

        <div class="d-flex flex-column gap-4 mb-5">

            @foreach($feedbacks as $feedback)

                <div class="border border-dark rounded-4 p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="fw-bold mb-0">
                            {{ $feedback->name }}
                        </h5>

                        <div class="text-warning fs-4">
                            @for($i = 0; $i < $feedback->rating; $i++)
                                ★
                            @endfor
                        </div>

                    </div>

                    <p class="mb-0">
                        {{ $feedback->text }}
                    </p>

                </div>

            @endforeach

{{--            <div class="d-flex justify-content-center mt-5">--}}

{{--                <nav>--}}
{{--                    <ul class="pagination">--}}

{{--                        <li class="page-item disabled">--}}
{{--                            <a class="page-link text-dark border-dark">Назад</a>--}}
{{--                        </li>--}}

{{--                        <li class="page-item active">--}}
{{--                            <a class="page-link text-dark border-dark">1</a>--}}
{{--                        </li>--}}

{{--                        <li class="page-item">--}}
{{--                            <a class="page-link text-dark border-dark" href="#">2</a>--}}
{{--                        </li>--}}

{{--                        <li class="page-item">--}}
{{--                            <a class="page-link text-dark border-dark" href="#">3</a>--}}
{{--                        </li>--}}

{{--                        <li class="page-item">--}}
{{--                            <a class="page-link text-dark border-dark" href="#">Вперёд</a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </nav>--}}

{{--            </div>--}}

        </div>

        <h2 class="text-center mt-5">Добавить свой отзыв</h2>

        <div class="d-flex justify-content-center">

            <form action="{{ route('feedback_form') }}" method="POST" class="border border-dark rounded-4 p-4 mb-5 mt-3 text-center w-50">

                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold">Имя</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Оценка</label>
                    <select name="rating" class="form-select">
                        <option value="5">★★★★★</option>
                        <option value="4">★★★★☆</option>
                        <option value="3">★★★☆☆</option>
                        <option value="2">★★☆☆☆</option>
                        <option value="1">★☆☆☆☆</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Отзыв</label>
                    <textarea name="text" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-dark px-4 rounded-5">Добавить отзыв</button>

            </form>

        </div>


    </div>

@endsection
