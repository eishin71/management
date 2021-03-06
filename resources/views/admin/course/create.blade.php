@extends('layouts.admin')
@section('title','コース編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\CourseController@index') }}">戻る</a>
        </div>
    </div>
    <h2>コース編集画面</h2>
    <div class="row">
        <div class="col-md-7">
            <form action="{{ action('Admin\CourseController@create') }}" method="post">
                <div class="form-group row">
                    <label class="col-md-2">コース名称</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">所要時間</label>
                    <div class="col-md-10">
                        <input type="time" class="form-control" name="required_time" value="{{ old('required_time') }}">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="保存">
            </form>
        </div>
    </div>
</div>
@endsection
