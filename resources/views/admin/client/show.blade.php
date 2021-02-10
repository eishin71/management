@extends('layouts.admin')
@section('title','顧客情報')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <h2>顧客情報</h2>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="form-group row">
                <label class="col-md-2">氏名</label>
                <div class="col-md-10">
                    <P>{{ ($client->name) }}</P>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">性別</label>
                <div class="col-md-10">
                    <P>{{ ($client->sex) }}</P>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">職業</label>
                <div class="col-md-10">
                    <P>{{ ($client->job) }}</P>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">生年月日</label>
                <div class="col-md-10">
                    <P>{{ ($client->birthday->format('Y年m月d日')) }}</P>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-1">
            <form action="{{ action('Admin\ClientController@details',['id' => $client->id]) }}" method="get">
                {{  csrf_field()}}
                <input type="submit" class="btn btn-primary" value="詳細">
            </form>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-1">
            <form action="{{ action('Admin\MedicalHistoryController@add',['id' => $client->id]) }}" method="get">
                {{  csrf_field()}}
                <input type="submit" class="btn btn-primary" value="問診票の入力">
            </form>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-1">
            <form action="{{ action('Admin\MedicalHistoryController@index',['id' => $client->id]) }}" method="get">
                {{  csrf_field()}}
                <input type="submit" class="btn btn-primary" value="問診票一覧">
            </form>
        </div>
    </div>
</div>
@endsection
