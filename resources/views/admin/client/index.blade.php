@extends('layouts.admin')
@section('title','顧客一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <h2>顧客一覧</h2>
    <div class="form-group row">
        <div class="col-md-4">
            <a href="{{ action('Admin\ClientController@add') }}" role="button" class="btn btn-primary">新規登録</a>
        </div>
    </div>
    <form action="{{ action('Admin\ClientController@index') }}" method="get">
        <div class="form-group row">
            <div class="list-client col-md-12 mx-auto">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="15%%">名前</th>
                            <th width="15%">生年月日</th>
                            <th width="15%">連絡先</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $client)
                        <tr>
                            <th>
                                <a href="{{ action('Admin\ClientController@show',['id' => $client->id]) }}">
                                    {{ $client->id }}
                                </a>
                            </th>
                            <td>{{($client->name) }}</td>
                            <td>{{($client->birthday->format('Y年m月d日'))}}</td>
                            <td>{{($client->phonenumber)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection
