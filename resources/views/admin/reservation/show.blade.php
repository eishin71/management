@extends('layouts.admin')
@section('title', '予約詳細')
@section('content')
    <div class="container">
      <h2>予約詳細</h2>
        <div class="row">
          <div class="list-reservation col-sm-5 mx-auto">
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th>予約番号：</th>
                    <td>{{ ($r->id) }}</td>
                  </tr>
                  <tr>
                    <th>予約希望日時：</th>
                    <td>{{ ($r->date->format('Y年m月d日 H:i')) }}</td>
                  </tr>
                  <tr>
                    <th>コース：</th>
                    <td>{{ ($r->course->name) }}</td>
                  </tr>
                  <tr>
                    <th>氏名：</th>
                    <td>{{ ($r->name) }}</td>
                  </tr>
                  <tr>
                    <th>電話番号:</th>
                    <td>{{ ($r->phonenumber) }}</td>
                  </tr>
                  <tr>
                    <th>e-mail:</th>
                    <td>{{ ($r->mail) }}</td>
                  </tr>
                  <tr>
                    <th>症状：</th>
                    <td>{{ ($r->symptom) }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            @if($r->status == '予約確定')
            <div class="alert alert-primary">
            <h2>予約確定済みです。</h2>
            @endif
          </div>
      　</div>
    </div>
      <div class="row">
        <div class="col-md-4">
          @if($r->status != '予約確定')
          <form action="{{ action('Admin\ReservationController@update_status',['id' => $r->id]) }}"
          method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="予約確定">
          </form>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form action="{{ action('Admin\ReservationController@remove',['id' => $r->id]) }}" method="post">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-danger" value="削除">
          </form>
        </div>
      </div>
@endsection
