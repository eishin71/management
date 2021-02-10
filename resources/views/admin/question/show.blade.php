@extends('layouts.admin')
@section('title','質問詳細')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\QuestionController@index') }}" >戻る</a>
        </div>
    </div>
    <h2>コース詳細</h2>
    <div class="h5">
        <p>・{{ $question->question }}</p>
    </div>
    <div class="row">
        <div class="col-md-4">
            @if($question->del_flg == false)
            <form action="{{ action('Admin\QuestionController@hidden',['id' => $question->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger" value="非表示">
            </form>
            @endif
            @if($question->del_flg != false)
            <form action="{{ action('Admin\QuestionController@return',['id' => $question->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="再表示">
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
