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
        <label class="col-md-2">コース</label>
        <div class="col-md-10">
          <select　name="course_id">
            <option value="">コースを選択してください</option>
            @foreach ($courses as $c)
              <option value="{{ $c->id}}">{{ $c->name }}</option>
            @endforeach
        </div>
      </div>
        <div class="form-group row">
          <label class="col-md-2">施術箇所</label>
          <div class="col-md-10">
            <select name="part">
              <option value=""></option>
              <option value="頭">頭</option>
              <option value="首">首</option>
              <option value="右肩">右肩</option>
              <option value="左肩">左肩</option>
              <option value="右肩甲骨">右肩甲骨</option>
              <option value="左肩甲骨">左肩甲骨</option>
              <option value="胸">胸</option>
              <option value="右上腕">右上腕</option>
              <option value="左上腕">左上腕</option>
              <option value="右前腕">右前腕</option>
              <option value="左前腕">左前腕</option>
              <option value="右手首">右手首</option>
              <option value="左手首">左手首</option>
              <option value="右手">右手</option>
              <option value="左手">左手</option>
              <option value="腰">腰</option>
              <option value="背中">背中</option>
              <option value="股関節">股関節</option>
              <option value="腹">腹</option>
              <option value="尻">尻</option>
              <option value="右太もも">右太もも</option>
              <option value="左太もも">左太もも</option>
              <option value="右ふくらはぎ">右ふくらはぎ</option>
              <option value="左ふくらはぎ">左ふくらはぎ</option>
              <option value="右足首">右足首</option>
              <option value="左足首">左足首</option>
              <option value="右足">右足</option>
              <option value="左足">左足</option>

            </select>
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
