@extends('layouts.admin')
@section('title','質問編集')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>質問編集画面</h2>
        <form action="{{ action('Admin\QuestionController@create') }}" method="post">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ action('Admin\QuestionController@index') }}">質問一覧</a>
            </div>
          </div>
          <p></p>
          <div class="form-group row">
            <label class="col-md-2">質問内容</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="question" value="{{ old('question') }}">
            </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="保存">
        </form>
      </div>
    </div>
  </div>
@endsection
