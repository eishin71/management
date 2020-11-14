@extends('layouts.admin')
@section('title','問診票の入力')
@section('content')
  <div class="container">
    <h2>問診票の入力</h2>
    <form action="{{ action('Admin\Medical_historyController@create') }}" method="post">
      <div class="form-group row">
        <label class="col-md-2">{{ $question->question }}</label>

      </div>

    </form>

  </div>
@endsection
