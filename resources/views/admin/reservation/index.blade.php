@extends('layouts.admin')
@section('title', '予約の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>予約一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ReservationController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ReservationController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2"></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-reservation col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="2%">ID</th>
                                <th width="13%">名前</th>
                                <th width="5%">年齢</th>
                                <th width="5%">性別</th>
                                <th width="12%">電話番号</th>
                                <th width="15%">e-mail</th>
                                <th width="15%">コース</th>
                                <th width="15%">予約希望日時</th>
                                <th width="20%">症状</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $reservation)
                                <tr>
                                    <th>
                                      <a href="{{ action('Admin\ReservationController@show', ['id' => $reservation->id]) }}">
                                      {{ $reservation->id }}
                                      </a>
                                    </th>
                                    <td>{{ str_limit($reservation->name, 20) }}</td>
                                    <td>{{ str_limit($reservation->age, 10) }}</td>
                                    <td>{{ str_limit($reservation->sex, 10) }}</td>
                                    <td>{{ str_limit($reservation->phonenumber, 15) }}</td>
                                    <td>{{ str_limit($reservation->mail, 30) }}</td>
                                    <td>{{ str_limit($reservation->course_id, 20) }}</td>
                                    <td>{{ str_limit($reservation->date, 20) }}</td>
                                    <td>{{ str_limit($reservation->symptom, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
