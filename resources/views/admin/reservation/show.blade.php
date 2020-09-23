@extends('layouts.admin')
@section('title', '予約詳細')
@section('content')
    <div class="container">
      <h2>予約詳細</h2>
        <div class="h5">
        <p>予約番号：{{ $r->id }}</p>
        <p>予約希望日時：{{ ($r->date->format('Y年m月d日 H:i')) }}</p>
        <p>コース：{{ ($r->course->name) }}</p>
        <p>氏名：{{ ($r->name) }}</p>
        <p>電話番号:{{ ($r->phonenumber) }}</p>
        <p>e-mail:{{ ($r->mail) }}</p>
        <p>症状：{{ ($r->symptom) }}</p>
        @if($r->status == '予約確定')
        <p>予約確定済みです。</p>
        @endif
      </div>
      <div class="row">
        <div class="col-md-4">
          @if($r->status != '予約確定')
          <form action="{{ action('Admin\ReservationController@update_status',['id' => $r->id]) }}"
          method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="予約確定">
          </form>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form action="{{ action('Admin\ReservationController@remove',['id' => $r->id]) }}" method="post">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-danger" value="削除">
          </form>
        </div>
      </div>
  </div>
@endsection
