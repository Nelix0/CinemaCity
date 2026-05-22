@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2 class="mb-4">Корзина покупок</h2>

        @if($cartItems->isEmpty())
            <div class="alert alert-info">Ваша корзина пуста.</div>
        @else
            <div class="row">

                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            @foreach($cartItems as $item)
                                <div class="row align-items-center mb-3 pb-3 border-bottom">
                                    <div class="col-md-2">
                                        <img src="../public/{{ $item->img }}" class="img-fluid rounded" alt="Шкаф">
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="mb-1">{{ $item->title }}</h5>
                                        <small class="text-muted">Размеры: {{ $item->width }} x {{ $item->height }}</small>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control form-control-sm w-50 me-2" min="1">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">🔄</button>
                                        </form>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <span class="fw-bold">{{ $item->price * $item->quantity }}  ₽</span>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-link text-danger p-0">🗑</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm border-dark">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Итого</h4>
                            <div class="d-flex justify-content-between mb-4 border-top pt-3">
                                <span class="h5">К оплате</span>
                                <span class="h5 fw-bold text-success">{{$total}} ₽</span>
                            </div>

                            <form action="{{ route('buy.cart') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-dark w-100 py-2">
                                    Купить
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
