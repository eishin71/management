<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Treatment;
use Faker\Generator as Faker;

$factory->define(Treatment::class, function (Faker $faker) {
    return [
        'client_id' => '1',
        'part' => '["右腕","腰"]',
        'Treatment_date' => '2021-03-01',
    ];
});
