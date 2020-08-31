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
              <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="form-group row">
              <label class="col-md-2">名前</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">性別</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="sex" value="{{ old('sex') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">年齢</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="age" value="{{ old('age') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">電話番号</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">e-mail</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="mail" value="{{ old('mail') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">予約希望日時</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="date" value="{{ old('date') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">コース</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="course" value="{{ old('course') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">症状</label>
              <div class="col-md-10">
                <textarea class="form-control" name="symptom" rows="20">{{ old('symptom') }}</textarea>
              </div>
            </div>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="送信">
          </form>
        </div>
      </div>
    </div>
@endsection
