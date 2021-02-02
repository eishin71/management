<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Rules\ReservationRule;

class Reservation extends Model
{
    protected $guarded = array('id');

    protected $dates = [
      'start_date',
    ];

    public static function rules($start_date, $course_id)
    {
        return array(
      'name' => 'required',
      'sex' => 'required',
      'age' => 'required',
      'phonenumber' => 'required',
      'mail' => 'required',
      'start_date' => ['required', new ReservationRule($start_date, $course_id)],
      'course_id' => 'required',
      'symptom' => '',
      );
    }

    public static function calcEndDate($start_date, $course_id)
    {
        $course = Course::find($course_id);
        $required_time = new Carbon($course->required_time);
        $required_hour = $required_time->hour;
        $required_minute = $required_time->minute;

        $end_date = new Carbon($start_date);
        $end_date->addHours($required_hour);
        $end_date->addMinutes($required_minute);

        return $end_date;
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function create($form)
    {
        $form['start_date'] = new Carbon($form['start_date']);
        $this->fill($form);
        //症状がない場合、からのデータを送る
        if ($this->symptom == null) {
            $this->symptom = '';
        }
        $this->save();
    }
}
