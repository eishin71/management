<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medical_history;
use App\Question;
use App\Answer;
use App\Client;
use App\Course;
use App\Treatment;
use Carbon\Carbon;

class Medical_historyController extends Controller
{
  public function add(Request $request,$id)
  {
    $questions = Question::where('del_flg',false)->get();
    $courses = Course::where('del_flg',false)->get();

    return view('admin.medical_history.create',compact('questions','id','courses'));
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
    $treatment = new Treatment;
    $treatment->course = $form['course'];
    $treatment->part = $form['part'];
    $treatment->treatment = $form['treatment'];
    $treatment->treatment_date = $form['treatment_date'];
    $treatment->client_id = $form['client_id'];
    $treatment->save();

    return redirect()->action('Admin\ClientController@show',['id' => $form['client_id'],'treatment' => $treatment]);
  }

  public function index(Request $request,$id)
  {
    $answer = Answer::all();
    $clients = Client::where('id',$id)->get();
    $answers = Answer::where('client_id',$id)->get();

    //配列を初期化
    $answer_date_array = [];
    //コレクションを配列に変える
    $temp_array = $answers->toArray();
    foreach ($temp_array as $answer) {
      $answer_date_array[] = $answer['answer_date'];
    }
    //重複をとる
    $answer_date_array = array_unique($answer_date_array);
    foreach ($answer_date_array as $i => $answer_date) {
      $answer_date_array[$i] = new Carbon($answer_date);
    }

    return view('admin.medical_history.index',['answers' => $answers,'clients' => $clients,'answer_date_array' => $answer_date_array,'answer' => $answer,'client_id' => $id]);
  }

  public function show(Request $request,$client_id,$answer_date,$treatment_date)
  {
    //複数の条件を指定する方法
    $answers = Answer::where('client_id',$client_id)
                     ->where('answer_date',$answer_date)
                     ->get();
    $answer_date = new Carbon($answer_date);
    $treatment = Treatment::where('client_id',$client_id)
                     ->where('treatment_date',$treatment_date)
                     ->get();
    $treatment_date = new Carbon($treatment_date);


    return view('admin.medical_history.show',[ 'answers' => $answers,'answer_date' => $answer_date,'treatment' => $treatment,'treatment_date' => $treatment_date]);
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
