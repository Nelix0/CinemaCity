@extends('layouts.admin')

@section('content')

<div class="container mt-5">

    <h2>Шкафы</h2>

    <button class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">
        Добавить шкаф
    </button>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Тип</th>
            <th>Материал</th>
            <th>Ширина</th>
            <th>Высота</th>
            <th>Действия</th>
        </tr>

       @foreach($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->title }}</td>
            <td>{{ $p->description }}</td>
            <td>{{ $p->price }} ₽</td>
            <td>{{ $p->type }}</td>
            <td>{{ $p->material }} </td>
            <td>{{ $p->width }} </td>
            <td>{{ $p->height }} </td>

            <td>

                <button type="button" class="btn btn-sm btn-warning"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $p->id }}">
                    Редактировать
                </button>

                <a href="/admin/products/delete/{{ $p->id }}" class="btn btn-sm btn-danger">
                    Удалить
                </a>

            </td>
        </tr>


        <div class="modal fade" id="edit{{ $p->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST" action="/admin/products/update/{{ $p->id }}" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header">
                            <h5>Редактировать шкаф</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <input name="title" value="{{ $p->title }}" class="form-control mb-2" placeholder="Название">
                            <input name="description" value="{{ $p->description }}" class="form-control mb-2" placeholder="Описание">
                            <input name="type" value="{{ $p->type }}" class="form-control mb-2" placeholder="Тип">
                            <input name="material" value="{{ $p->material }}" class="form-control mb-2" placeholder="Материал">
                            <input name="width" value="{{ $p->width }}" class="form-control mb-2" placeholder="Ширина">
                            <input name="height" value="{{ $p->height }}" class="form-control mb-2" placeholder="Высота">
                            <input name="price" value="{{ $p->price }}" class="form-control mb-2" placeholder="Цена">
                            <input name="img" value="{{ $p->img }}" class="form-control mb-2" placeholder="Фото">


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-dark">Сохранить</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        @endforeach

    </table>

</div>


<div class="modal fade" id="addProductModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="{{ route('admin.products.add') }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5>Добавить шкаф</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input name="title"  class="form-control mb-2" placeholder="Название">
                    <input name="description"  class="form-control mb-2" placeholder="Описание">
                    <input name="type"  class="form-control mb-2" placeholder="Тип">
                    <input name="material" class="form-control mb-2" placeholder="Материал">
                    <input name="width"  class="form-control mb-2" placeholder="Ширина">
                    <input name="height"  class="form-control mb-2" placeholder="Высота">
                    <input name="price"  class="form-control mb-2" placeholder="Цена">
                    <input name="img"  class="form-control mb-2" placeholder="Фото">

                </div>

                <div class="modal-footer">
                    <button class="btn btn-dark">Добавить</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
