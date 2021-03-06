@extends('layouts.admin')
@section('title','予約フォーム')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>Pure＋ 予約フォーム</h2>
            <form action="{{ action('ReservationController@confirm') }}" method="post">
            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($error_message !== '')
            <p>{{ $error_message }}</p>
            @endif
            <div class="form-group row">
                <label class="col-md-3">名前</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">性別</label>
                <div class="col-md-9">
                    <select name="sex">
                        <option value="">性別を選択してください</option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">年齢</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="age" value="{{ old('age') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">電話番号</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">メールアドレス</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="mail" value="{{ old('mail') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">予約希望日時</label>
                <div class="col-md-9">
                    <input type="datetime-local" class="form-control" name="start_date" value="{{ old('start_date') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">コース</label>
                <div class="col-md-9">
                    <select name="course_id">
                        <option value="">コースを選択してください</option>
                        @foreach ($courses as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">症状</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="symptom" rows="20">{{ old('symptom') }}</textarea>
                </div>
            </div>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="送信">
            </form>
        </div>
    </div>
</div>
@endsection
