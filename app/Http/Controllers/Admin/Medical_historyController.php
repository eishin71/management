<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medical_history;
use App\Question;
use APP\Answer;
use Carbon\Carbon;

class Medical_historyController extends Controller
{
  public function add()
  {
    $questions = Question::where('del_flg',false)->get();
    return view('admin.medical_history.create',compact('questions'));
  }

  public function create(Request $request)
  {
    $this->validate($request,Answer::$rules);
    $answer = new Answer;
    $form = $request->all();
    unset($form['_token']);

    $answer->fill($form);
    $answer->save();

    return redirect('admin/medical_history/',['form' => $form]);
  }
}
