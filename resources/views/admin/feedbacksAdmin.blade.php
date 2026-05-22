@extends('layouts.admin')

@section('content')

    <div class="container mt-5">

    <h2>Feedbacks</h2>

    <table class="table table-hover mt-3">

        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Сообщение</th>
            <th>Действия</th>
        </tr>

       @foreach($feedbacks as $f)
        <tr>
            <td>{{ $f->id }}</td>
            <td>{{ $f->name }}</td>
            <td>{{ $f->text }}</td>
            <td>
                <a href="/admin/feedbacks/delete/{{ $f->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Удалить отзыв?')">
                    Удалить
                </a>
            </td>
        </tr>
        @endforeach

    </table>

</div>

@endsection
