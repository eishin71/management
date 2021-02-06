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
        <div class="list-client col-sm-5 me-auto">
            <div class="row">
                <table class="table table-dark">
                    <tbody>
                        <tr>
                            <th>氏名：</th>
                            <td>{{ ($client->name) }}</td>
                        </tr>
                        <tr>
                            <th>性別：</th>
                            <td>{{ ($client->sex) }}</td>
                        </tr>
                        <tr>
                            <th>職業：</th>
                            <td>{{ ($client->job) }}</td>
                        </tr>
                        <tr>
                            <th>生年月日：</th>
                            <td>{{ ($client->birthday->format('Y年m月d日')) }}</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ action('Admin\ClientController@details',['id' => $client->id]) }}" method="get">
                    {{  csrf_field()}}
                    <input type="submit" class="btn btn-primary" value="詳細">
                </form>
                <form action="{{ action('Admin\MedicalHistoryController@add',['id' => $client->id]) }}" method="get">
                    {{  csrf_field()}}
                    <input type="submit" class="btn btn-primary" value="問診票の入力">
                </form>
                <form action="{{ action('Admin\MedicalHistoryController@index',['id' => $client->id]) }}" method="get">
                    {{  csrf_field()}}
                    <input type="submit" class="btn btn-primary" value="問診票一覧">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
