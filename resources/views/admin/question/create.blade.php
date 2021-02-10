@extends('layouts.admin')
@section('title','質問編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <h2>質問編集画面</h2>
    <form action="{{ action('Admin\QuestionController@create') }}" method="post">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="form-group row">
                    <label class="col-md-2">質問内容</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="question" value="{{ old('question') }}">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="保存">
            </div>
        </div>
    </form>
</div>
@endsection
