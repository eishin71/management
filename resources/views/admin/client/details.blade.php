@extends('layouts.admin')
@section('title','顧客詳細')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <h2>顧客詳細</h2>
       <div class="form-group row">
         <label class="col-md-2">氏名</label>
         <div class="col-md-10">
           <p>{{ $client->name }}</p>
    　   </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">性別</label>
         <div class="col-md-10">
           <p>{{ $client->sex }}</p>
    　   </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">職業</label>
         <div class="col-md-10">
           <p>{{ $client->job }}</p>
    　   </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">生年月日</label>
         <div class="col-md-10">
           <p>{{ $client->birthday->format('Y年m月d日') }}</p>
    　   </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">住所</label>
         <div class="col-md-10">
           <p>{{ $client->domicile }}</p>
    　   </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">電話番号</label>
         <div class="col-md-10">
           <p>{{ $client->phonenumber }}</p>
    　   </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">メールアドレス</label>
         <div class="col-md-10">
           <p>{{ $client->mail }}</p>
    　   </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">備考</label>
         <div class="col-md-10">
           <p>{{ $client->remarks }}</p>
    　   </div>
       </div>
      <p></p>
      <form action="{{ action('Admin\ClientController@edit',['id' => $client->id]) }}" method="get">
        {{  csrf_field()}}
        <input type="submit" class="btn btn-danger" value="詳細">
      </form>
    </div>
  </div>
</div>
@endsection
