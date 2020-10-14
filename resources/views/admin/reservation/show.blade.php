@extends('layouts.admin')
@section('title', '予約詳細')
@section('content')
    <div class="container">
      <h2>予約詳細</h2>
      <div calign=”left”>
        <div class="row">
          <div class="list-reservation col-sm-5 mx-auto">
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th width="2%">予約番号：{{ $r->id }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th width="13%">予約希望日時：{{ ($r->date->format('Y年m月d日 H:i')) }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th width="15%">コース：{{ ($r->course->name) }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th width="15%">氏名：{{ ($r->name) }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th width="12%">電話番号:{{ ($r->phonenumber) }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th width="15%">e-mail:{{ ($r->mail) }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <table class="table table-dark">
                <tbody>
                  <tr>
                    <th width="15%">症状：{{ ($r->symptom) }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
            @if($r->status == '予約確定')
            <p>予約確定済みです。</p>
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
  </div>
@endsection
