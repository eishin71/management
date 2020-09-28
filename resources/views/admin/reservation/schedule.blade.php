@extends('layouts.admin')
@section('title','施術スケジュール')

@section('content')
  <div class="container">
    <div class="row">
      <h2>施術スケジュール</h2>
    </div>
    <div class="col-md-8">
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
                    <td>{{ str_limit($r->id, 20) }}</td>
                    <td>{{ str_limit($r->name, 20) }}</td>
                    <td>{{ str_limit($r->date, 20) }}</td>
                    <td>{{ str_limit($r->course_id, 20) }}</td>
                    <td>{{ str_limit($r->phonenumber, 15) }}</td>
                    <td>{{ str_limit($r->mail, 30) }}</td>
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
