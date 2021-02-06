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

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
