@extends('layouts.admin')
@section('title','問診票')
@section('content')
  <div class="container">
    <h2>問診票</h2>
    <div class="row">
      <div class="list-answer col-md-5 md-auto">
        <h3>{{ $answer_date->format('Y年m月d日') }}</h3>
          @foreach($answers as $answer)
          <div class="row">
            {{ $answer->question->question }}
            {{ $answer->answer }}
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
