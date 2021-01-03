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
          <p></p>
          <div class="form-group row">
            <label class="col-md-4">コース</label>
            <div class="col-md-8">
              <p>{{ $treatment->course->name }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4">施術箇所</label>
            <div class="col-md-8">
              <p>{{ $treatment->part }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4">施術内容</label>
            <div class="col-md-8">
              <p>{{ $treatment->treatment }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <div class="human_figure_block">
              <img class="human_figure" alt="施術箇所" src="{{ asset('/img/human_figure.jpg') }}">
              @if ($treatment->part == "腰")
              <div class="human_figure_part koshi"></div>
              @else if ($treatment->part == "左腕")
              <div class="human_figure_part"　style="top:200px; left:50px;"></div>

              @endif
            </div>
          </div>
          </div>
        </div>
      </div>
@endsection
