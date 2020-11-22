@extends('layouts.admin')
@section('title','問診票')
@section('content')
  <div class="container">
    <h2>問診票</h2>
    <div class="row">
      <div class="list-answer col-md-5 md-auto">
        <div class="row">
          <table class="table table-dark">
            <tbody>
              <tr>
                <th>来店日</th>
                <td>{{ ($answer->answer_date) }}</td>
              </tr>
            </tbody>

          </table>

        </div>

      </div>

    </div>
  </div>
@endsection
