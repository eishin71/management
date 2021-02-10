@extends('layouts.admin')
@section('title', '顧客詳細編集画面')

@section('content')
<div class="container">
    <h2>顧客詳細編集画面</h2>
    <form action="{{ action('Admin\ClientController@update',['id' => $client->id]) }}" method="post">
        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group row">
            <label class="col-md-2">氏名</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{ $client->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">性別</label>
            <div class="col-md-10">
                <select name="sex">
                    <option value="">性別を選択してください</option>
                    <option value="男" {{ $client->sex =='男' ? 'selected' : '' }}>男</option>
                    <option value="女" {{ $client->sex =='女' ? 'selected' : '' }}>女</option>
                    <option value="その他" {{ $client->sex =='その他' ? 'selected' : '' }}>その他</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">職業</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="job" value="{{ $client->job }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">生年月日</label>
            <div class="col-md-10">
                <input type="date" class="form-control" name="birthday" value="{{ $client->birthday->format('Y-m-d') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">住所</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="domicile" value="{{ $client->domicile }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">電話番号</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="phonenumber" value="{{ $client->phonenumber }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">メールアドレス</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="mail" value="{{ $client->mail }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">備考</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="remarks" value="{{ $client->remarks }}">
            </div>
        </div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="更新">
    </form>
</div>
@endsection
