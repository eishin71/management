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
        <p>症状：{{ ($r->symptom) }}</p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form action="{{ action('Admin\ReservationController@create') }}"
          method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <input type="hidden" value="確定">
            <input type="submit" class="btn btn-primary" value="予約確定">
          </form>
        </div>
      </div>
  </div>
@endsection
