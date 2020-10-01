@extends('layouts.admin')
@section('title','施術スケジュール')

@section('content')
  <div class="container">
    <div class="row">
      <h2>施術スケジュール</h2>
    </div>
    <div class="col-md-12">
      <form action="{{ action('Admin\ReservationController@schedule') }}" method="get">
        <div class="row">
          <div class="list-schedule col-md-12 mx-auto">
            <div class="row">
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th width="2%">ID</th>
                    <th width="13%">名前</th>
                    <th width="15%">予約希望日時</th>
                    <th width="15%">コース</th>
                    <th width="12%">電話番号</th>
                    <th width="15%">e-mail</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($reservation as $r)
                  <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->date->format('Y年m月d日 H:i') }}</td>
                    <td>{{ $r->course->name }}</td>
                    <td>{{ $r->phonenumber }}</td>
                    <td>{{ $r->mail }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
@endsection
