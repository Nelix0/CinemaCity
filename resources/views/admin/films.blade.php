@extends('layouts.admin')

@section('content')

    <div class="container mt-5">

        <h2>Фильмы</h2>


        <button class="btn btn-dark mb-3" data-bs-toggle="modal"data-bs-target="#addFilmModal">
            Добавить фильм
        </button>

        <table class="table  table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Жанр</th>
                <th>Действия</th>
            </tr>

            @foreach($films as $f)
                <tr>
                    <td>{{$f->id}}</td>
                    <td>{{$f->name}}</td>
                    <td>{{$f->genre}}</td>
                    <td>

                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$f->id}}">
                            Редактировать
                        </button>

                        <a href="/admin/films/delete/{{$f->id}}" class="btn btn-sm btn-danger">
                            Удалить
                        </a>

                    </td>

                </tr>

                <div class="modal fade" id="edit{{$f->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form method="POST" action="/admin/films/update/{{$f->id}}" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-header">
                                    <h5>Редактировать</h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <input name="name" value="{{$f->name}}" class="form-control mb-2">
                                    <input name="genre" value="{{$f->genre}}" class="form-control mb-2">
                                    <input name="country" value="{{$f->country}}" class="form-control mb-2">
                                    <input name="age_rating" value="{{$f->age_rating}}" class="form-control mb-2">

                                    <input type="file" name="img" class="form-control mb-2">

                                    <input name="price" value="{{$f->price}}" class="form-control mb-2">

                                    <select name="status" class="form-control">
                                        <option value="now" {{$f->status=='now'?'selected':''}}>Сейчас в показе</option>
                                        <option value="soon" {{$f->status=='later'?'selected':''}}>Скоро</option>
                                    </select>

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

    <div class="modal fade" id="addFilmModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{route('admin.films.addFilm')}}">
                    @csrf

                    <div class="modal-header">
                        <h5>Добавить фильм</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input name="name" class="form-control mb-2" placeholder="Название">
                        <input name="genre" class="form-control mb-2" placeholder="Жанр">
                        <input name="country" class="form-control mb-2" placeholder="Страна">
                        <input name="age_rating" class="form-control mb-2" placeholder="Возраст">
                        <input name="description" class="form-control mb-2" placeholder="Описание">
                        <input name="img" class="form-control mb-2" placeholder="Фото">
                        <input name="price" class="form-control mb-2" placeholder="Цена">
                        <select name="status" class="form-control mb-2">
                            <option value="now">Сейчас в показе</option>
                            <option value="later">Скоро</option>
                        </select>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-dark">Сохранить</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection

