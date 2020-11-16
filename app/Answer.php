<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Answer extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'answer' => '',
    'client_id' => '',
    'question_id' => '',
  );
}
