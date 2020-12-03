<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Treatment extends Model
{
  protected $guarded = array('id');

  protected $dates = [
    'treatment_date'
  ];

  public static $rules = array(
    'course' => '',
    'part' => '',
    'treatment' => '',
    'treatment_date' => '',
    'client_id' => '',
  );

}
