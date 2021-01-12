<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Barryvdh\Debugbar\Facade as Debugbar;

class Treatment extends Model
{
    protected $guarded = array('id');

    protected $dates = [
    'treatment_date'
  ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function decode_part()
    {
        Debugbar::info(json_decode($this->part));
        return json_decode($this->part);
    }

    public static $rules = array(
    'course' => '',
    'part' => '',
    'treatment' => '',
    'treatment_date' => '',
    'client_id' => '',
  );
}
