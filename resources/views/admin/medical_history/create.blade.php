@extends('layouts.admin')
@section('title','問診票の入力')
@section('content')
  <div class="container">
    <h2>問診票の入力</h2>
    <p></p>
    <form action="{{ action('Admin\Medical_historyController@create') }}" method="post">
      <input type="hidden" name="client_id" value="{{ $id }}">
      <div class="form-group row">
        <label class="col-md-2">来店日</label>
        <div class="col-md-10">
          <input type="date" class="form-control" name="answer_date" value="{{ old('answer_date') }}">
        </div>
      </div>
      @foreach ($questions as $q)
      <div class="form-group row">
        <label class="col-md-2" value="{{ $q->id }}">{{ $q->question }}</label>
        <div class="col-md-10">
          <select name="answer[{{ $q->id }}]">
            <option value=""></option>
            <option value="はい">はい</option>
            <option value="いいえ">いいえ</option>
          </select>
        </div>
      </div>
      @endforeach
      <div class="form-group row">
        <label class="col-md-2">施術日</label>
        <div class="col-md-10">
          <input type="date" class="form-control" name="treatment_date" value="{{ old('treatment_date') }}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2">コース</label>
        <div class="col-md-10">
          <select　name="course">
            <option value="">コースを選択してください</option>
            @foreach ($courses as $c)
              <option value="{{ $c->id}}">{{ $c->name }}</option>
            @endforeach
        </div>
      </div>
        <div class="form-group row">
          <label class="col-md-2">施術箇所</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="part" value="{{ old('part') }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2">治療内容</label>
          <div class="col-md-10">
            <textarea class="form-control" name="treatment" rows="20">{{ old('treatment') }}</textarea>
          </div>
        </div>

      {{ csrf_field() }}
      <input type="submit" class="btn btn-primary" value="保存">
    </form>
  </div>

@endsection
