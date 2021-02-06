@extends('layouts.admin')
@section('title','コース一覧')

@section('content')
<div class="container">
    <div class="row">
        <h2>コース一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-14">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\CourseController@add') }}" role="button" class="btn btn-primary">コース追加</a>
        </div>
    </div>
    <div class="row">
        <div class="list-course col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="45%">コース名称</th>
                            <th width="20%">所要時間</th>
                            <th width="30%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $course)
                        <tr>
                            <th>
                                <a href="{{ action('Admin\CourseController@show', ['id' => $course->id]) }}">
                                    {{ $course->id }}
                                </a>
                            </th>
                            <td>{{ str_limit($course->name,50) }}</td>
                            <td>{{ str_limit($course->required_time,50) }}</td>
                            @if($course->del_flg == false)
                            <td></td>
                            @endif
                            @if($course->del_flg == true)
                            <td>非表示になっています</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
