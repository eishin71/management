<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Course;

class ReservationTest extends TestCase
{
    public function test_decode_part()
    {
    //ダミーデータを作る
    $reservation = factory(Reservation::class)->create();

}
