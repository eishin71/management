@extends('layouts.admin')
@section('title','問診票編集画面')
@section('content')
<div class="container">
  <h2>問診票編集画面</h2>
  <form action="{{ action('Admin\MedicalHistoryController@update',
  ['client_id' => $treatment->client_id,'treatment_date' => $treatment->treatment_date->format('Ymd')]) }}" method="post">
    <div class="form-group row">
      <label class="col-md-2">来店日</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="treatment_date" value="{{ $treatment->treatment_date->format('Y年m月d日') }}">
      </div>
    </div>
  </form>

</div>
@endsection
