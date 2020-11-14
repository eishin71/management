<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medical_history;
use App\Question;

class Medical_historyController extends Controller
{
  public function add()
  {
    $questions = Question::where('del_flg',false)->get();
    return view('admin.medical_history.create');
  }

  public function create(Request $request)
  {
    $this->validate($request,Answer::$rules);
    $client = new Answer;
    $form = $request->all();
    unset($form['_token']);

    $client->fill($form);
    $client->save();

    return redirect('admin/medical_history/');
  }
}
