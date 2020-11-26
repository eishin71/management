@extends('layouts.admin')
@section('title','問診票一覧')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-14">
      <a href="{{ action('Admin\StartController@index') }}">　HOME</a>
    </div>
  </div>
  <p></p>
  <div class="row">
    <h2>問診票一覧</h2>
    </div>
    <div class="row">
      @foreach($medical_history as $m)
      <div class="form-group row">
        <label class="col-md-2">来店日</label>
        <div class="col-md-10">
          <input type="date" class="form-control" name="answer_date" value="{{ old('answer_date') }}">
        </div>
      </div>
          <div class="row">
            @foreach($question as $q)
            <div class="form-group row">
              <label class="col-md-2" value="{{ $q->id }}">{{ $q->question }}</label>
              <div class="col-md-10">

              </div>
            </div>
            @endforeach
          </div>


@endforeach
    </div>
  </div>
</div>
@endsection
