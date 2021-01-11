<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;
use App\Course;
use App\Reservation;

class ReservationRule implements Rule
{
  private $start_date;
  private $end_date;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start_date, $course_id)
    {
        $this->start_date = new Carbon($start_date);

        $course = Course::find($course_id);
        $required_time = new Carbon($course->required_time);
        $required_hour = $required_time->hour;
        $required_minute = $required_time->minute;

        $this->end_date = new Carbon($start_date);
        $this->end_date->addHours($required_hour);
        $this->end_date->addMinutes($required_minute);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    //予約が重複して
    public function passes($attribute, $value)
    {
        $not_conflict_reservation = Reservation::where('start_date','<=',$this->start_date)
                                               ->where('end_date','>=',$this->start_date)
                                               ->doesntExist();
        return $not_conflict_reservation;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'この時間に予約することはできません。';
    }
}
