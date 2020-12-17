@extends('layouts.admin')
@section('title','予約受付')
@section('content')
  <div class="container">
    <h2>予約を受け付けました</h2>
    <div class="h5">
      <p>この度はご予約誠にありがとうございます。</p>
    </div>
    <div class="row">
      <div class="col-md-4">
        <form action="{{ action('Admin\ReservationController@add') }}"
        method="get">
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="フォームに戻る">
        </form>

      </div>

    </div>
  </div>
@endsection
