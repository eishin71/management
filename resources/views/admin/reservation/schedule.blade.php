@extends('layouts.admin')
@section('title','施術スケジュール')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-14">
      <a href="{{ action('Admin\StartController@index') }}">HOME</a>
    </div>
  </div>
  <div class="row">
    <h2>施術スケジュール</h2>
  </div>
  <div class="row">
    <?php $before_date = null; ?>
    @foreach($reservation as $r)
    @if($before_date != $r->start_date->format('Y年m月d日'))
    <div class="list-reservation col-md-12 mx-auto">
      <div class="row">
        <table class="table table-dark">
          <thead>
            <tr>
              <th width="2%">ID</th>
              <th width="13%">名前</th>
              <th width="15%">予約日時</th>
              <th width="15%">コース</th>
              <th width="12%">電話番号</th>
              <th width="15%">e-mail</th>
            </tr>
          </thead>
          <tbody>
            <h3>{{ $r->date->format('Y年m月d日') }}</h3>
            @endif
            <tr>
              <th>
                <a href="{{ action('Admin\ReservationController@show', ['id' => $r->id]) }}">
                  {{ $r->id }}
                </a>
              </th>
              <td>{{ $r->name }}</td>
              <td>{{ $r->start_date->format('m月d日 H:i') }}</td>
              <td>{{ $r->course->name }}</td>
              <td>{{ $r->phonenumber }}</td>
              <td>{{ $r->mail }}</td>
            </tr>
            <?php $before_date = $r->start_date->format('Y年m月d日'); ?>
          </tbody>
        </table>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
