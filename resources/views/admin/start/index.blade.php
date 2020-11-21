@extends('layouts.admin')
@section('title','顧客管理')
@section('content')
  <div align="center">
    <div class="container">
        <h2>顧客管理</h2>
          <div class="row">
            <div class="list-start col-md-5 mx-auto">
              <div class="row">
                <table class="table table-dark">
                    <tr>
                      <th>
                        <a href="{{ action('Admin\ClientController@add') }}" >新規顧客情報登録</a>
                      </th>
                    </tr>
                    <tr>
                      <th>
                        <a href="{{ action('Admin\ClientController@index') }}" >顧客一覧</a>
                      </th>
                    </tr>
                    <tr>
                      <th>
                        <a href="{{ action('Admin\ReservationController@index') }}" >予約一覧</a>
                      </th>
                    </tr>
                    <tr>
                      <th>
                        <a href="{{ action('Admin\ReservationController@schedule') }}" >スケジュール</a>
                      </th>
                    </tr>
                    <tr>
                      <th>
                        <a href="{{ action('Admin\CourseController@index') }}" >コース一覧</a>
                      </th>
                    </tr>
                    <tr>
                      <th>
                        <a href="{{ action('Admin\QuestionController@index') }}" >問診票質問内容一覧</a>
                      </th>
                    </tr>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
@endsection
