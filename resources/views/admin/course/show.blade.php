@extends('layouts.admin')
@section('title','コース詳細')
@section('content')
  <div class="container">
    <h2>コース詳細</h2>
      <div class="h5">
      <p>・{{ $c->name }}</p>
      <p>・{{ $c->required_time }}</p>
      </div>
      <div class="row">
        <div class="col-md-4">
          @if($c->del_flg == false)
          <form action="{{ action('Admin\CourseController@hidden',['id' => $c->id]) }}"
          method="post" enctype="multipart/form-data">

          {{ csrf_field() }}
          <input type="submit" class="btn btn-danger" value="非表示">
          </form>
          @endif
          <p></p>
          @if($c->del_flg != false)
          <form action="{{ action('Admin\CourseController@return',['id' => $c->id]) }}"
          method="post" enctype="multipart/form-data">

          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="再表示">
          @endif
        </div>
      </div>
  </div>
@endsection
