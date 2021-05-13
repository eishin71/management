<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        //'id' => '8',
        'name' => '120分コース',
        'required_time' => '02:00:00'
    ];
});
