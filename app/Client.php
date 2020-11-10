<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Client extends Model
{
  protected $guarded = array('id');

  protected $dates = [
    'birthday'
  ];

  public static $rules = array(
    'name' => '',
    'sex' => '',
    'job' => '',
    'birthday' => '',
    'age' => '',
    'domicile' => '',
    'phonenumber' => '',
    'e-mail' => '',
    'remarks' => '',
    'symptom' => '',
    'course_id' => '',
  );
}
