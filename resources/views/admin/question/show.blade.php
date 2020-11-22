@extends('layouts.admin')
@section('title','質問詳細')
@section('content')
  <div class="container">
    <h2>コース詳細</h2>
      <div class="h5">
      <p>・{{ $question->question }}</p>
      </div>
      <div class="row">
        <div class="col-md-4">
          @if($question->del_flg == false)
          <form action="{{ action('Admin\QuestionController@hidden',['id' => $question->id]) }}"
          method="post" enctype="multipart/form-data">

          {{ csrf_field() }}
          <input type="submit" class="btn btn-danger" value="非表示">
          </form>
          @endif
          <p></p>
          @if($question->del_flg != false)
          <form action="{{ action('Admin\QuestionController@return',['id' => $question->id]) }}"
          method="post" enctype="multipart/form-data">

          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="再表示">
          @endif
        </div>
      </div>
  </div>
@endsection