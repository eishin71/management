@extends('layouts.admin')
@section('title','問診票の入力')
@section('content')
<div class="container">
  <h2>問診票の入力</h2>
  <form action="{{ action('Admin\MedicalHistoryController@create') }}" method="post">
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
      <label class="col-md-2">コース</label>
      <div class="col-md-10">
        <select name="course_id">
          <option value="">コースを選択してください</option>
          @foreach ($courses as $c)
          <option value="{{ $c->id}}">{{ $c->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-2">施術箇所</label>
      <div class="col-md-10">
        <label>
          <input type="checkbox" name="part[]" value="頭">頭
        </label>
        <label>
          <input type="checkbox" name="part[]" value="首">首
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右肩">右肩
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左肩">左肩
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右肩甲骨">右肩甲骨
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左肩甲骨">左肩甲骨
        </label>
        <label>
          <input type="checkbox" name="part[]" value="胸">胸
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右上腕">右上腕
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左上腕">左上腕
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右前腕">右前腕
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左前腕">左前腕
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右手首">右手首
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左手首">左手首
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右手">右手
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左手">左手
        </label>
        <label>
          <input type="checkbox" name="part[]" value="腰">腰
        </label>
        <label>
          <input type="checkbox" name="part[]" value="背中">背中
        </label>
        <label>
          <input type="checkbox" name="part[]" value="股関節">股関節
        </label>
        <label>
          <input type="checkbox" name="part[]" value="腹">腹
        </label>
        <label>
          <input type="checkbox" name="part[]" value="尻">尻
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右太もも">右太もも
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左太もも">左太もも
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右ふくらはぎ">右ふくらはぎ
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左ふくらはぎ">左ふくらはぎ
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右足首">右足首
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左足首">左足首
        </label>
        <label>
          <input type="checkbox" name="part[]" value="右足">右足
        </label>
        <label>
          <input type="checkbox" name="part[]" value="左足">左足
        </label>
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
