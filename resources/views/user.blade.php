@extends('layouts.app')

@section('content')
    <div class="container py-5" style="min-height: 70vh;">
        <div class="row g-4">


            <div class="col-12 col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 p-4">
                    <div class="text-center mb-3">
                        <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center fw-bold fs-3 mb-2" style="width: 70px; height: 70px;">
                            {{ mb_substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <h5 class="fw-bold mb-0 text-dark">{{ Auth::user()->name }}</h5>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </div>
                    <hr class="text-muted">
                    <div class="small text-secondary mb-3">
                        <div class="mb-2"><i class="bi bi-calendar3 me-2"></i> На сайте с: {{ Auth::user()->created_at->format('d.m.Y') }}</div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100 py-2 btn-sm rounded-3 fw-medium">Выйти из профиля</button>
                    </form>
                </div>
            </div>


            <div class="col-12 col-lg-8">
                <h3 class="fw-bold text-dark mb-4">История ваших заказов</h3>

                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="accordion d-flex flex-column gap-3" id="ordersAccordion">

                    @if($orders->count() > 0)

                        @foreach($orders as $order)

                            <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden mb-0">

                                <div class="accordion-header">
                                    <div class="accordion-button collapsed bg-white p-3 d-flex flex-wrap align-items-center gap-3 cursor-pointer"
                                         data-bs-toggle="collapse"
                                         data-bs-target="#order-{{ $order->id }}">

                                        <div class="flex-grow-1">
                                            <span class="fw-bold text-dark d-block">Заказ №{{ $order->id }}</span>
                                            <small class="text-muted">{{ $order->created_at }}</small>
                                        </div>

                                        <div class="me-3 text-end">
                                            <span class="fw-bold text-dark d-block">{{ $order->price }} ₽</span>
                                            <small class="text-muted">{{ $order->quantity }} шт.</small>
                                        </div>



                                    </div>
                                </div>

                                <div id="order-{{ $order->id }}" class="accordion-collapse collapse" data-bs-parent="#ordersAccordion">
                                    <div class="accordion-body bg-light-subtle border-top p-3">

                                        <div class="mb-2">
                                            <strong>Товар:</strong> {{ $order->title }}
                                        </div><div class="text-end">
                                            <form action="{{ route('repeat.order', $order->id) }}" method="POST" class="d-inline">
                                                @csrf

                                                <button type="submit" class="btn btn-dark btn-sm px-4 py-2 fw-medium rounded-3 shadow-sm">
                                                    Повторить заказ
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        @endforeach

                    @else

                        <div class="text-center py-5 text-muted bg-white rounded-3 shadow-sm">
                            <i class="bi bi-bag-x display-4 d-block mb-3 text-secondary"></i>
                            Вы еще не совершали заказов.
                        </div>

                    @endif

                </div>

                <div class="d-flex justify-content-center mt-4"></div>

            </div>

        </div>
    </div>
@endsection
