@extends('layouts.admin')
@section('title','コース一覧')

@section('content')
  <div class="container">
    <div class="row">
      <h2>コース一覧</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <a href="{{ action('Admin\CourseController@add') }}"
      role="button" class="btn btn-primary">コース追加</a>
    </div>
  </div>
  <div class="row">
    <div class="list-course col-md-12 mx-auto">
      <div class="row">
        <table class="table table-dark">
          <thead>
            <tr>
              <th width="5%">ID</th>
              <th width="5%">・</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $course)
              <tr>
                <td>{{ str_limit($course->name,50) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
