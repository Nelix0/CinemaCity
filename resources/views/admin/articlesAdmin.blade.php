@extends('layouts.admin')

@section('content')

<div class="container mt-5">

    <h2>Полезные статьи</h2>

    <button class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addArticle">
        Добавить статью
    </button>

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>

      @foreach( $articles as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->title }}</td>
            <td>

                <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $a->id }}">
                    Редактировать
                </button>

                <a href="/admin/articles/delete/{{ $a->id }}" class="btn btn-danger btn-sm">
                    Удалить
                </a>

            </td>
        </tr>

        <div class="modal fade" id="edit{{ $a->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST" action="/admin/articles/update/{{ $a->id }}">
                        @csrf

                        <div class="modal-header">
                            <h5>Редактировать статью</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <input name="title" value="{{ $a->title }}" class="form-control mb-2">
                            <textarea name="text" class="form-control mb-2">{{ $a->text }}</textarea>

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


<div class="modal fade" id="addArticle">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="{{ route('admin.articles.add') }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5>Добавить статью</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input name="title" class="form-control mb-2" placeholder="Название">
                    <textarea name="text" class="form-control mb-2" placeholder="Текст"></textarea>


                </div>

                <div class="modal-footer">
                    <button class="btn btn-dark">Добавить</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
