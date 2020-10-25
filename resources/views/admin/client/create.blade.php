@extends('layouts.admin')
@section('title','新規顧客情報登録')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <h2>新規顧客情報登録</h2>
      <form action="{{ action('Admin\ClientController@create') }}"
       method="post" enctype="multipart/form-data">

       <div class="form-group row">
         <label class="col-md-2">氏名</label>
         <div class="col-md-10">
           <input type="text" class="form-control" name="name" value="{{ old('name') }}">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">性別</label>
         <div class="col-md-10">
           <select name="sex">
             <option value="">性別を選択してください</option>
             <option value="男">男</option>
             <option value="女">女</option>
             <option value="その他">その他</option>
           </select>
         </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">職業</label>
         <div class="col-md-10">
           <input type="text" class="form-control" name="job" value="{{ old('job') }}">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-md-2">生年月日</label>
         <div class="col-md-10">
           <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
         </div>
       </div>
       {{ csrf_field() }}
       <input type="submit" class="btn btn-primary" value="保存">
      </form>
      <form action="{{ action('Admin\ClientController@create2') }}"
      method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
    　  <input type="submit" class="btn btn-danger" value="詳細">
      </form>
    </div>
  </div>
</div>
@endsection
