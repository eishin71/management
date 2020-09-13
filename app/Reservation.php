<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = array('id');

    protected $dates = [
      'date'
    ];



    public static $rules = array(
      'name' => 'required',
      'sex' => 'required',
      'age' => 'required',
      'phonenumber' => 'required',
      'mail' => 'required',
      'date' => 'required',
      'course_id' => 'required',
      'symptom' => '',
    );

    public function course()
    {
      return $this->belongsTo('App\Course');
    }
}
