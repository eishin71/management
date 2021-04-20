<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'id' => '1'
        'name' => '山田'
        'sex' => '男'
        'age' => '42'
        'phonenumber' => '090-9688-0000'
        'mail' => 'eshihbga@gmail.com'
        'start_date' => '2021-03-17 10:00:00'
        'course_id' => '1'
        'symptom' => 'しんどい'
        'status' => '予約確定'
        'end_date' => '2021-03-17 11:30:00'
    ];
});
