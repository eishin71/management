<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $guarded = array('id');

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
