<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function create($form){
      $form['date'] = new Carbon($form['date']);
      $this->fill($form);
      //症状がない場合、からのデータを送る
      if ($this->symptom == null){
        $this->symptom = '';
      }
      $this->save();
    }
}
