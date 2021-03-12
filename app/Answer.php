<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Answer extends Model
{
    protected $guarded = array('id');

    protected $dates = [
        'answer_date'
    ];

    public static $rules = array(
        'answer_dae' => '',
        'answer' => '',
        'client_id' => '',
        'question_id' => '',
    );

    //staticはクラスメソッド
    public static function createAnswers($answers,$answer_date,$client_id){
        foreach ($answers as $question_id => $answer_text) {
            $answer = new Answer;
            $answer->answer_date = $answer_date;
            $answer->question_id = $question_id;
            $answer->client_id = $client_id;
            $answer->answer = $answer_text;
            $answer->save();
        }
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
