@extends('layouts.admin')
@section('title', '予約詳細')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <h2>予約詳細</h2>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="form-group row">
                <label class="col-md-2">予約番号</label>
                <p>{{ ($r->id) }}</p>
            </div>
            <div class="form-group row">
                <label class="col-md-2">予約希望日時</label>
                <p>{{ ($r->start_date->format('Y年m月d日 H時i分')) }}</p>
            </div>
            <div class="form-group row">
                <label class="col-md-2">コース</label>
                <p>{{ ($r->course->name) }}</p>
            </div>
            <div class="form-group row">
                <label class="col-md-2">氏名</label>
                <p>{{ ($r->name) }}</p>
            </div>
            <div class="form-group row">
                <label class="col-md-2">電話番号</label>
                <p>{{ ($r->phonenumber) }}</p>
            </div>
            <div class="form-group row">
                <label class="col-md-2">e-mail</label>
                <p>{{ ($r->mail) }}</p>
            </div>
            <div class="form-group row">
                <label class="col-md-2">症状</label>
                <p>{{ ($r->symptom) }}</p>
            </div>
            @if($r->status == '予約確定')
            <div class="form-group row">
                <div class="col-md-5">
                    <div class="alert alert-primary">
                        <h2>予約確定済みです。</h2>
                    </div>
                </div>
            </div>
            @endif
            @if($r->status != '予約確定')
            <form action="{{ action('Admin\ReservationController@update_status',['id' => $r->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="予約確定">
            </form>
            @endif
            <form action="{{ action('Admin\ReservationController@remove',['id' => $r->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger" value="削除">
            </form>
        </div>
    </div>
</div>
@endsection
