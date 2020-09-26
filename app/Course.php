<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'name' => 'required',
  );
}
