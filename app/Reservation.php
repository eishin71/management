<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    protected $guarded = array('id');

    protected $dates = [
      'start_date',

    ];



    public static $rules = array(
      'name' => 'required',
      'sex' => 'required',
      'age' => 'required',
      'phonenumber' => 'required',
      'mail' => 'required',
      'start_date' => 'required',
      'course_id' => 'required',
      'symptom' => '',
      'end_date' => 'required'
    );

    public function course()
    {
      return $this->belongsTo('App\Course');
    }

    public function create($form){
      $form['start_date'] = new Carbon($form['start_date']);
      $this->fill($form);
      //症状がない場合、からのデータを送る
      if ($this->symptom == null){
        $this->symptom = '';
      }
      $this->save();
    }
}
