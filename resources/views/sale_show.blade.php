
@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 mx-auto" style="max-width: 1000px;">


            <div class="row g-4">
                <div class="col-md-6">
                    <div class="rounded-3 overflow-hidden bg-light h-100">
                        <img src="../public/{{$sale->img }}" alt="{{ $sale->title }}" class="w-100 h-100" style="min-height: 450px;">
                    </div>
                </div>

                <div class="col-md-6 d-flex flex-column justify-content-between">

                    <h3 class="fw-bold mb-4">{{ $sale->title }}</h3>

                    <div class="mb-4">
                        <label class="form-label fw-bold mb-2">Тип шкафа</label>
                        <div class="text-dark">{{ $sale->type }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">Параметры</label>

                        <div class="mb-2">
                            <span class="text-muted d-block small mb-1">Ширина шкафа , мм</span>
                            <div class="text-dark">{{ $sale->width }}</div>
                        </div>

                        <div class="mb-2">
                            <span class="text-muted d-block small mb-1">Высота шкафа , мм</span>
                            <div class="text-dark">{{ $sale->height }}</div>
                        </div>

                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold mb-2">Описание</label>

                        <div class="mb-2">
                            <p class=" mb-4 " style="text-align: justify; font-size: 0.9rem; line-height: 1.4;">{{ $sale->description }}</p>
                        </div>

                    </div>


                    <div class="mt-auto pt-4 border-top">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <span class="fs-2 fw-bold" id="product-price">{{ $sale->price }} ₽</span>


                        </div>

                        <div class="row g-2 align-items-center">
                            <div class="col-sm-6">
                                <form action="{{ route('cart.add', $sale->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-dark w-100 py-2 fw-medium">
                                        В корзину
                                    </button>
                                </form>

                            </div>
                            <div class="col-sm-6">
                                <form action="{{ route('buy', $sale->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-dark w-100 py-2 fw-medium">
                                        Купить
                                    </button>
                                </form>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function incrementQty() {
            const input = document.getElementById('quantity');
            input.value = parseInt(input.value) + 1;
        }

        function decrementQty() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>

@endsection
