@extends('layouts.admin')
@section('title','予約フォーム　確認画面')

@section('content')
<div align="center">
  <div class="container">
    <h2>予約フォーム　確認画面</h2>
      <div class="row">
        <div class="list-reservation col-md-7 mx-auto">
          <form action="{{ action('ReservationController@create') }}" method="post">
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th>名前：</th>
                    <td>{{ $form['name'] }}</td>
                    <input type="hidden" name="name" value="{{ $form['name'] }}">
                  </tr>
                  <tr>
                    <th>性別：</th>
                    <td>{{ $form['sex'] }}</td>
                    <input type="hidden" name="sex" value="{{ $form['sex'] }}">
                  </tr>
                  <tr>
                    <th>年齢：</th>
                    <td>{{ $form['age'] }}</td>
                    <input type="hidden" name="age" value="{{ $form['age'] }}">
                  </tr>
                  <tr>
                    <th>電話番号：</th>
                    <td>{{ $form['phonenumber'] }}</td>
                    <input type="hidden" name="phonenumber" value="{{ $form['phonenumber'] }}">
                  </tr>
                  <tr>
                    <th>メールアドレス：</th>
                    <td>{{ $form['mail'] }}</td>
                    <input type="hidden" name="mail" value="{{ $form['mail'] }}">
                  </tr>
                  <tr>
                    <th>予約希望日時：</th>
                    <td>{{ $form['start_date'] }}</td>
                    <input type="hidden" name="start_date" value="{{ $form['start_date'] }}">
                  </tr>
                  <tr>
                    <th>コース：</th>
                    <td>{{ $form['course_id'] }}</td>
                    <input type="hidden" name="course_id" value="{{ $form['course_id'] }}">
                  </tr>
                  <tr>
                    <th>症状：</th>
                    <td>{{ $form['symptom'] }}</td>
                    <input type="hidden" name="symptom" value="{{ $form['symptom'] }}">
                  </tr>
                </tbody>
              </table>
              {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="送信">
            </div>
          </form>
          <form action="{{ action('ReservationController@add') }}"
          method="get">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-danger" value="フォームに戻る">
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
