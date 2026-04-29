@extends('layouts.admin')

@section('content')

    <div class="container mt-5">

        <h2>Расписание</h2>


        <button class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addSession">
            Добавить расписание
        </button>


        <table class="table table-hover">

            <tr>
                <th>Фильм</th>
                <th>Дата</th>
                <th>Время</th>
                <th></th>
            </tr>

            @foreach($sessions as $s)
                <tr>
                    <td>{{$s->film_id}}</td>
                    <td>{{$s->date}}</td>
                    <td>{{$s->time}}</td>
                    <td>
                        <a href="/admin/sessions/delete/{{$s->id}}" class="btn btn-sm btn-danger">
                            Удалить
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>

    <div class="modal fade" id="addSession" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{route('admin.sessions.addSession')}}">
                    @csrf

                    <div class="modal-header">
                        <h5>Добавить расписание</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">


                        <select name="film_id" class="form-control mb-2">
                            @foreach($films as $film)
                                <option value="{{$film->id}}">
                                    {{$film->name}}
                                </option>
                            @endforeach
                        </select>

                        <input type="date" name="date" class="form-control mb-2">
                        <input type="time" name="time" class="form-control mb-2">

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-dark">Сохранить</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
