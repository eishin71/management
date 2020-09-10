@extends('layouts.admin')
@section('title', '予約詳細')

@section('content')
    <div class = "container">
      <div class = "row">
        <h2>予約確認</h2>
      </div>
      <div class = "col-md-4">
        <form action = "{{ action('Admin\ReservationController@show' )}}" method = "get">
          <div class = "form-group row">
            <label class="col-md-2">タイトル</label>
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
        <div class = "row">
            <div class = "list-reservation col-md-12 mx-auto">
                <div class = "row">
                    <table class = "table table-dark">
                        <thead>
                            <tr>
                                <th height = "20%">予約希望日時</th>
                                <th height = "20%">コース</th>
                                <th height = "20%">氏名</th>
                                <th height = "20%">症状</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $reservation)
                                <tr>
                                    <th>{{ $reservation->id }}</th>
                                    <td>{{ \Str::limit($reservation->date, 100)}}</td>
                                    <td>{{ \Str::limit($reservation->course_id, 100)}}</td>
                                    <td>{{ \Str::limit($reservation->name, 100)}}</td>
                                    <td>{{ \Str::limit($reservation->symptom, 100)}}</td>
                               </tr>
                            @endforeach
                        </tdody>
                    </table>
                </div>
            </div>
        </div>
@endsection
