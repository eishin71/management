<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Reservation;

class ReservationTest extends TestCase
{
    public function test_calcEndDate()
    {
    //ダミーデータを作る
    $reservation = factory(Reservation::class)->create();
    $target = $reservation->calcEndDate();
    $this->assertEquals($target[0],'1');
    }
}
