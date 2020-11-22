<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medical_history;
use App\Question;
use App\Answer;
use Carbon\Carbon;

class Medical_historyController extends Controller
{
  public function add(Request $request,$id)
  {
    $questions = Question::where('del_flg',false)->get();
    return view('admin.medical_history.create',compact('questions','id'));
  }

  public function create(Request $request)
  {
    $form = $request->all();
    foreach ($form['answer'] as $question_id => $answer_text) {
      $answer = new Answer;
      $answer->answer_date = $form['answer_date'];
      $answer->question_id = $question_id;
      $answer->client_id = $form['client_id'];
      $answer->answer = $answer_text;
      $answer->save();
    }
    return redirect()->action('Admin\ClientController@show',['id' => $form['client_id']]);
  }

  public function index(Request $request)
  {
    $posts = Answer::all();
    return view('admin.medical_history.index',['posts' => $posts]);
  }

  public function show(Request $request,$id)
  {
    $answer = Answer::find($id);
    return view('admin.medical_history.show',['answer' => $answer,'id' => $id]);
  }

  public function edit(Request $request,$id)
  {
    $answer = Answer::find($id);
    if (empty($answer)) {
      abort(404);
    }
    return view('admin.medical_history.edit',['answer' => $answer,'id' => $id]);
  }

  public function details(Request $request,$id)
  {
    $answer = Answer::find($id);
    return view('admin.medical_history.details',['answer' => $answer,'id' => $id]);
  }

  public function update(Request $request,$id)
  {
    $form = $request->all();
    foreach ($form['answer'] as $question_id => $answer_text) {
      $answer = new Answer;
      $answer->answer_date = $form['answer_date'];
      $answer->question_id = $question_id;
      $answer->client_id = $form['client_id'];
      $answer->answer = $answer_text;
      $answer->save();
    }
    return redirect()->action('Admin\ClientController@show',['id' => $form['client_id']]);
  }
}
