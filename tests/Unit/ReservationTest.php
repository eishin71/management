<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Reservation;
use App\Course;
use Carbon\Carbon;

class ReservationTest extends TestCase
{
    public function test_calcEndDate()
    {
    //ダミーデータを作る
    //$reservation = factory(Reservation::class)->create();
    //$target = $reservation->calcEndDate($aaa,$bbb);
    //$this->assertEquals($target[0],'1');
    $course = factory(Course::class)->create();
    $target = Reservation::calcEndDate("2021-04-20 20:00:00",$course->id);
    $this->assertEquals($target,new Carbon("2021-04-20 22:00:00"));
    }
}

//staticがついているとクラスメソッド
//staticがついていないとインスタンスメソッド
