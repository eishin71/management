<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MedicalHistory;
use App\Question;
use App\Answer;
use App\Client;
use App\Course;
use App\Treatment;
use Carbon\Carbon;

class MedicalHistoryController extends Controller
{
    public function add(Request $request, $id)
    {
        $questions = Question::where('del_flg', false)->get();
        $courses = Course::where('del_flg', false)->get();
        $client = Client::find($id);

        return view('admin.medicalhistory.create', compact('questions', 'id', 'courses','client'));
    }

    public function create(Request $request)
    {
        $form = $request->all();
        //フォームから入力した全てを受け取る
        Answer::createAnswers($form['answers']);
        
        $treatment = new Treatment;
        $treatment->course_id = $form['course_id'];
        //値をjson形式に配列を文字列に変換する
        $treatment->part = json_encode($form['part']);
        $treatment->treatment = $form['treatment'];
        $treatment->treatment_date = $form['answer_date'];
        $treatment->client_id = $form['client_id'];
        $treatment->save();

        return redirect()->action('Admin\ClientController@show', ['id' => $form['client_id'],'treatment' => $treatment]);
    }

    public function index(Request $request, $id)
    {
        $answer = Answer::all();
        $clients = Client::where('id', $id)->get();
        $client = Client::find($id);
        $answers = Answer::where('client_id', $id)->get();

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

        return view('admin.medicalhistory.index', ['answers' => $answers,'clients' => $clients,'answer_date_array' => $answer_date_array,'answer' => $answer,'client_id' => $id,'client' => $client]);
    }

    public function show(Request $request, $client_id, $answer_date)
    {
        $id = $client_id;
        $client = Client::find($id);
        $answer_date = new Carbon($answer_date);
        //複数の条件を指定する方法
        $answers = Answer::where('client_id', $client_id)
        ->where('answer_date', $answer_date)
        ->get();

        $treatment = Treatment::where('client_id', $client_id)
        ->where('treatment_date', $answer_date)
        ->first();

        return view('admin.medicalhistory.show', [ 'answers' => $answers,'answer_date' => $answer_date,'treatment' => $treatment,'client_id' => $client_id,'client' => $client ]);
    }

    public function edit(Request $request, $client_id, $answer_date)
    {
        $form = $request->all();
        $questions = Question::where('del_flg', false)->get();
        $courses = Course::where('del_flg', false)->get();
        $answers = Answer::where('client_id', $client_id)
        ->where('answer_date', $answer_date)
        ->get();
        $answer_date = new Carbon($answer_date);

        $treatment = Treatment::where('client_id', $client_id)
        ->where('treatment_date', $answer_date)
        ->first();
        return view('admin.medicalhistory.edit',
        [ 'answers' => $answers,'answer_date' => $answer_date,'treatment' => $treatment,'questions' => $questions,'courses' =>  $courses,'client_id' => $client_id ]);
    }

    public function update(Request $request, $client_id, $answer_date)
    {
        $form = $request->all();
        $answer_date = new Carbon($answer_date);
        //該当するAnswerを取得する
        $target_answers = Answer::where('answer_date', $answer_date)
        ->where('client_id', $form['client_id']);
        //取得したAnswerを削除する
        $target_answers->delete();
        //フォームから入力した全てを受け取る
        foreach ($form['answer'] as $question_id => $answer_text) {
            $answer = new Answer;
            $answer->answer_date = $form['answer_date'];
            $answer->question_id = $question_id;
            $answer->client_id = $form['client_id'];
            $answer->answer = $answer_text;
            $answer->save();
        }
        //treatmentをupdateする
        $treatment = Treatment::where('client_id', $form['client_id'])
        ->where('treatment_date', $answer_date)
        ->first();

        $treatment->course_id = $form['course_id'];
        //値をjson形式に配列を文字列に変換する
        $treatment->part = json_encode($form['part']);
        $treatment->treatment = $form['treatment'];
        $treatment->treatment_date = $form['answer_date'];
        $treatment->client_id = $form['client_id'];
        $treatment->save();

        $answers = Answer::where('client_id', $client_id)
        ->where('answer_date', $answer_date)
        ->get();

        return view('admin.medicalhistory.show', [ 'answer' => $answer,'answer_date' => $answer_date,'treatment' => $treatment,'client_id' => $client_id,'answers' => $answers ]);
    }

    public function remove(Request $request, $client_id, $answer_date)
    {
        //該当するAnswerを取得する
        Answer::where('answer_date', $answer_date)
        ->where('client_id', $client_id)
        ->delete();

        Treatment::where('client_id', $client_id)
        ->where('treatment_date', $answer_date)
        ->delete();

        return redirect()->action('Admin\MedicalHistoryController@index',['client_id' => $client_id,'answer_date' => $answer_date]);
    }

}
