<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reservation</title>
  </head>
  <body>
    <h1>予約画面</h1>
@extends('layouts.admin')
@section('title','予約フォーム')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h2>予約フォーム</h2>
          <form action="{{ action('Admin\ReservationController@create') }}"
          method="post" enctype="multipart/form-data">

            @if (count($errors) > 0)
                <ul>
                  @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                  @endforeach
                </ul>
            @endif
            <div class="form-group row">
              <label class="col-md-2">名前</label>
              <div class="col-md-10">
                <input rype="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">性別</label>
              <div class="col-md-10">
                <input rype="text" class="form-control" name="sex" value="{{ old('sex') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">年齢</label>
              <div class="col-md-10">
                <input rype="text" class="form-control" name="age" value="{{ old('age') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">電話番号</label>
              <div class="col-md-10">
                <input rype="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">e-mail</label>
              <div class="col-md-10">
                <input rype="text" class="form-control" name="e-mail" value="{{ old('e-mail') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">予約希望日時</label>
              <div class="col-md-10">
                <input rype="text" class="form-control" name="date" value="{{ old('date') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">コース</label>
              <div class="col-md-10">
                <input rype="text" class="form-control" name="course" value="{{ old('course') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">症状</label>
              <div class="col-md-10">
                <textarea class="form-control" name="symptom" rows="20">{{ old('symptom') }}</textarea>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" value="送信">"
          </form>
        </div>
      </div>
    </div>
    @endsection
  </body>
</html>
