@extends('layouts.admin')
@section('title','予約フォーム　確認画面')

@section('content')
予約フォーム　確認画面
<form action="{{ action('Admin\ReservationController@create') }}" method="post">
  <div class="">
  　<p>名前：{{ $form['name'] }}</p>
  　<input type="hidden" name="name" value="{{ $form['name'] }}">
　  <p>性別：{{ $form['sex'] }}</p>
    <input type="hidden" name="sex" value="{{ $form['sex'] }}">
　  <p>年齢：{{ $form['age'] }}</p>
    <input type="hidden" name="age" value="{{ $form['age'] }}">
　  <p>電話番号：{{ $form['phonenumber'] }}</p>
    <input type="hidden" name="phonenumber" value="{{ $form['phonenumber'] }}">
  　<p>メールアドレス：{{ $form['mail'] }}</p>
    <input type="hidden" name="mail" value="{{ $form['mail'] }}">
　  <p>予約希望日時：{{ $form['date'] }}</p>
    <input type="hidden" name="date" value="{{ $form['date'] }}">
　  <p>コース：{{ $form['course_id'] }}</p>
    <input type="hidden" name="course_id" value="{{ $form['course_id'] }}">
　  <p>症状：{{ $form['symptom'] }}</p>
   <input type="hidden" name="symptom" value="{{ $form['symptom'] }}">
　</div>
　{{ csrf_field() }}
　<input type="submit" class="btn btn-primary" value="送信">
</form>
<form action="{{ action('Admin\ReservationController@add') }}"
method="get">
{{ csrf_field() }}
<input type="submit" class="btn btn-danger" value="フォームに戻る">
</form>
@endsection
戻るボタン実装
