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
          <div class="form-group row">
            <label class="col-md-2">施術日</label>
            <div class="col-md-10">
              <p>{{ $treatment->treatment_date }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">コース</label>
            <div class="col-md-10">
              <p>{{ $treatment->course }}</p>
       　   </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2">施術箇所</label>
            <div class="col-md-10">
              <p>{{ $treatment->part }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">施術内容</label>
            <div class="col-md-10">
              <p>{{ $treatment->treatment }}</p>
       　   </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
