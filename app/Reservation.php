<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = array('id');

    public atatic $rules = array(
      'name' => 'required',
      'sex' => 'required',
      'age' => 'required',
      'phonenumber' => 'required',
      'e-mail' => 'required',
      'date' => 'required',
      'course' => 'required',
      'symptom' => 'required',
    );
}
