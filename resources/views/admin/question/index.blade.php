@extends('layouts.admin')
@section('title','コース一覧')

@section('content')
  <div class="container">
    <div class="row">
      <h2>質問一覧</h2>
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="{{ action('Admin\StartController@index') }}">　HOME</a>
      </div>
    </div>
    <p></p>
  <div class="row">
    <div class="col-md-4">
      <a href="{{ action('Admin\QuestionController@add') }}"
      role="button" class="btn btn-primary">コース追加</a>
    </div>
  </div>
  <p></p>
  <p></p>
  <div class="row">
    <div class="list-question col-md-12 mx-auto">
      <div class="row">
        <table class="table table-dark">
          <thead>
            <tr>
              <th width="5%">ID</th>
              <th width="45%">質問名称</th>
              <th width="50%"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $question)
              <tr>
                <th>
                  <a href="{{ action('Admin\QuestionController@show', ['id' => $question->id]) }}">
                  {{ $question->id }}
                  </a>
                </th>
                <td>{{ str_limit($question->question,50) }}</td>
                @if($question->del_flg == false)
                <td></td>
                @endif
                @if($question->del_flg == true)
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
