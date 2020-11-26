@extends('layouts.admin')
@section('title','顧客情報')
@section('content')
<div align="center">
  <div class="container">
    <h2>顧客情報</h2>
      <div class="row">
        <div class="list-client col-sm-5 me-auto">
          <div class="row">
            <table class="table table-dark">
              <tbody>
                <tr>
                  <th>氏名：</th>
                  <td>{{ ($client->name) }}</td>
                </tr>
                <tr>
                  <th>性別：</th>
                  <td>{{ ($client->sex) }}</td>
                </tr>
                <tr>
                  <th>職業：</th>
                  <td>{{ ($client->job) }}</td>
                </tr>
                <tr>
                  <th>生年月日：</th>
                  <td>{{ ($client->birthday->format('Y/m/d')) }}</td>
                </tr>
              </tbody>

            </table>
            <form action="{{ action('Admin\ClientController@details',['id' => $client->id]) }}" method="get">
              {{  csrf_field()}}
              <input type="submit" class="btn btn-danger" value="詳細">
            </form>
            <a href="{{ action('Admin\Medical_historyController@add',['id' => $client->id]) }}">問診票の入力</a>
            <a href="{{ action('Admin\Medical_historyController@show',['id' => $client->id]) }}">問診票一覧</a>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
