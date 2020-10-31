@extends('layouts.admin')
@section('title', '顧客詳細')
@section('content')
  <div class="container">
    <table class="table table-dark">
      <td>氏名</td>
      <td>{{ $client->name }}</td>

    </table>

  </div>
@endsection
