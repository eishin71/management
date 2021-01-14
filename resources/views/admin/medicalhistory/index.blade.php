@extends('layouts.admin')
@section('title','問診票一覧')
@section('content')
<div class="container">
  @foreach($clients as $client)
    <h2>{{ $client->name }} 様　問診票一覧</h2>
  @endforeach
  @foreach($answer_date_array as $answer_date)
    <div class="row">
      <a href="{{ action('Admin\MedicalHistoryController@show',
      ['client_id' => $client_id, 'answer_date' => $answer_date->format('Ymd')]) }}">
        {{ $answer_date->format('Y年m月d日') }}
      </a>
    </div>
  @endforeach
</div>
@endsection
