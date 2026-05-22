@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <h2 class="text-center mb-5">Каталог</h2>

        <div class="container mb-5">
            <div class="d-flex flex-wrap justify-content-center gap-3 ">

                <a href="{{ route('catalog') }}" class="btn {{ !request('category') ? 'btn-dark' : 'btn-outline-dark' }} px-4">
                    Все товары
                </a>

                <a href="{{ route('catalog', ['category' => 'wardrobes']) }}" class="btn {{ request('category') == 'wardrobes' ? 'btn-dark' : 'btn-outline-dark' }} px-4">
                    Шкафы-купе
                </a>

                <a href="{{ route('catalog', ['category' => 'dressing-rooms']) }}" class="btn {{ request('category') == 'dressing-rooms' ? 'btn-dark' : 'btn-outline-dark' }}  px-4">
                    Гардеробные
                </a>

                <div class="dropdown">
                    <button class="btn btn-outline-dark px-4 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Цена
                    </button>
                    <ul class="dropdown-menu border-dark rounded-3">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}">Сначала дешевле</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}">Сначала дороже</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row g-4">

            @foreach($products as $product)

                <div class="card product-card col-md-4 flex-column h-100 d-flex">



                        <div class="ratio ratio-4x3 overflow-hidden rounded-4 mt-3">
                            <img src="../public/{{ $product->img }}" class="w-100 h-100 object-fit-cover" alt="Шкаф купе">
                        </div>

                        <div class="card-body text-center p-4">

                            <h4 class="card-title fw-bold mb-3">{{ $product->title }}</h4>

                            <p class="card-text text-muted mb-4 px-2 flex-grow-1 " style="text-align: justify; font-size: 0.9rem; line-height: 1.4;">{{ $product->description }}</p>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-3">

                                <span class="fs-4 fw-bold px-4">{{ $product->price }}₽</span>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('buy', $product->id) }}" class="btn btn-dark px-4 fw-bold btn-buy d-inline-flex align-items-center justify-content-center">Купить</a>
                                    <a href="{{ route('cart') }}" class="btn btn-outline-dark d-inline-flex align-items-center justify-content-center p-0" style="width: 42px; height: 42px;">🛒</a>
                                </div>

                            </div>

                            <a href="{{ route('show', $product->id) }}" class="btn btn-outline-dark w-100 py-2">Подробнее</a>
                        </div>

                </div>

            @endforeach

        </div>
    </div>

@endsection
