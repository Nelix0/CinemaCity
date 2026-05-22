@extends('layouts.app')

@section('content')


    <div class="container py-5">

        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="fw-bold text-primary">Dresscode</h2>
                <p class="text-muted">Мы создаем не просто корпусную мебель — мы проектируем личный порядок каждого клиента. Специализируемся на шкафах-купе и гардеробных любой сложности.</p>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ asset('public/assets/img/sh.jpg') }}" alt="Гардероб" class="img-fluid rounded">
            </div>
        </div>


        <section class="mb-5 mt-5">
            <h2 class="mb-4 text-center mt-5">Каталог</h2>

            <div id="catalogCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-3">
                            @foreach($products as $product)
                                <div class="col-4">
                                    <a href="{{ route('show', $product->id) }}">
                                        <img src="../public/{{ $product->img }}" class="d-block w-100 rounded  object-fit-cover" alt="" width="200" height="300">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row g-3">
                            @foreach($products as $product)
                                <div class="col-4">
                                    <a href="{{ route('show', $product->id) }}">
                                        <img src="../public/{{ $product->img }}" class="d-block w-100  rounded" alt=""  width="300" height="400">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#catalogCarousel" data-bs-slide="prev" style="width: 5%; filter: invert(1);">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Назад</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#catalogCarousel" data-bs-slide="next" style="width: 5%; filter: invert(1);">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Вперед</span>
                </button>
            </div>


            <div class="text-center mt-4">
                <a href="catalog" class="btn btn-dark px-5">Смотреть всё</a>
            </div>
        </section>


        <section class="mb-5">
            <h3 class="mb-4 text-center">Акции</h3>

            <div class="row g-4">

              @foreach($sales as $sale)
                <div class="col-md-3">
                    <div class="promo-card d-flex flex-column h-100 border rounded-4 p-2">

                        <img src="../public/{{ $sale->img }}" class="d-block w-100 rounded" alt=""  width="300" height="250" >

                        <h5>{{ $sale->title }}</h5>

                        <p class="small text-muted flex-grow-1" >
                            {{ $sale->description }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <del class="text-muted fs-4 fw-bold">
                                {{ $sale->old_price }}₽
                            </del>

                            <span class="fs-4 fw-bold text-danger">
                            {{ $sale->price }}₽
                        </span>
                        </div>

                        <a href="{{ route('show', $sale->id) }}" class="btn btn-outline-dark w-100 py-2">Подробнее</a>
                    </div>
                </div>



                @endforeach

            </div>
        </section>


        <section><h2 class="  mb-4 text-center ">Новости</h2>
            <h3 class="text-primary">Запуск новой коллекции</h3>
            <p style="text-align: justify" >
                Мы рады представить нашу новую коллекцию, в которой объединили безупречный минимализм и умные технологии хранения. Новая серия шкафов-купе — это не просто мебель, а полноценная часть вашего интерьера.Что нового в этой коллекции:Сверхтонкие профили: Мы уменьшили видимую часть рамок, чтобы фасады выглядели как единое полотно.Новые текстуры: Эксклюзивные покрытия с эффектом «Soft-touch» и глубокие древесные фактуры (Дуб Скальный, Кашемир, Графит).Бесшумное скольжение: Обновленная европейская система роликов обеспечивает абсолютно плавное и тихое открытие дверей.Интеллектуальный свет: Внутренняя подсветка теперь оснащена датчиками движения и регулировкой теплоты света.Порядок внутри — гармония снаружи. Ознакомьтесь с новинками уже сейчас в нашем каталоге или закажите бесплатный выезд замерщика для создания индивидуального проекта.
            </p>
        </section>

    </div>


@endsection
