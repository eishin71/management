<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class QuestionController extends Controller
{
    public function add()
    {
        return view('admin.question.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Question::$rules);
        $question = new Question;
        $form = $request->all();

        unset($form['_token']);
        //データベースに保存する
        $question->fill($form);
        $question->save();

        return redirect('admin/question/create');
    }

    public function index(Request $request)
    {
        $posts = Question::all();
        return view('admin.question.index', ['posts' => $posts]);
    }

    public function delete(Request $request)
    {
        $question = Question::find($request->id);
        $question->delete();
        return redirect('admin/question/');
    }

    public function show(Request $request, $id)
    {
        $question = Question::find($id);
        return view('admin.question.show', ['question' => $question, 'id' => $id]);
    }

    public function hidden(Request $request, $id)
    {
        Question::find($id)->update(['del_flg' => true]);
        return redirect('admin/question/');
    }

    public function return(Request $request, $id)
    {
        Question::find($id)->update(['del_flg' => false]);
        return redirect('admin/question/');
    }
}
