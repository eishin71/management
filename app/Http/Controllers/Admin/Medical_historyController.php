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
    /*配列*/
    foreach ($form['answer'] as $question_id => $answer_text) {
      $answer = new Answer;
      $answer->answer_date = $answer_date;
      $answer->question_id = $question_id;
      $answer->client_id = $form['client_id'];
      $answer->answer = $answer_text;
      $answer->save();
    }
    return redirect()->action('Admin\ClientController@show',['id' => $form['client_id']]);
  }
}
