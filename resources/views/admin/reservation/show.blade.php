@extends('layouts.admin')
@section('title', '予約詳細')

@section('content')
    <div class = "container">
      <div class = "row">
        <h2>予約確認</h2>
      </div>
        </div>
        <div class = "row">
            <div class = "list-reservation col-md-12 mx-auto">
                <div class = "row">
                    <table class = "table table-dark">
                        <thead>
                            <tr>
                                <th height = "20%">予約希望日時</th>
                                <th height = "20%">コース</th>
                                <th height = "20%">氏名</th>
                                <th height = "20%">症状</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <th>{{ $r->id }}</th>
                                    <td>{{ \Str::limit($r->date, 100)}}</td>
                                    <td>{{ \Str::limit($r->course_id, 100)}}</td>
                                    <td>{{ \Str::limit($r->name, 100)}}</td>
                                    <td>{{ \Str::limit($r->symptom, 100)}}</td>
                               </tr>

                        </tdody>
                    </table>
                </div>
            </div>
        </div>
@endsection
