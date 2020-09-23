<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public static $rules = array(
    'name' => 'required',
  );
}
