@extends('layouts.admin')
@section('title','問診票')
@section('content')
  <div class="container">
    <h2>問診票</h2>
    <div class="row">
      <div class="list-answer col-md-5 md-auto">
        @foreach($answer_date_array as $answer_date)
        <h3>{{ $answer_date }}</h3>
          @foreach($answers as $answer)
            @if($answer->answer_date == $answer_date)
          <div class="row">
            {{ $answer->question->question }}
            {{ $answer->answer }}
          </div>
            @endif
          @endforeach
        @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
