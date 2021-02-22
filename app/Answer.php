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
        'answer_date' => '',
        'answer' => '',
        'client_id' => '',
        'question_id' => '',
    );

    public static function createAnswers($answers){
        foreach ($form['answer'] as $question_id => $answer_text) {
            $answer = new Answer;
            $answer->answer_date = $form['answer_date'];
            $answer->question_id = $question_id;
            $answer->client_id = $form['client_id'];
            $answer->answer = $answer_text;
            $answer->save();
        }
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
