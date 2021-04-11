<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Treatment;

class TreatmentTest extends TestCase
{
    public function test_decode_part()
    {
    //ダミーデータを作る
    $treatment = factory(Treatment::class)->create();
    $target = $treatment->decode_part();
    //$this->assertEqualsは二つの値を比較して判定する
    $this->assertEquals($target[0],'右腕');
    $this->assertEquals($target[1],'腰');

    }
}
reservationのcalcEnddateのテストメソッドを作る

courseのfactoryを作る

Reservationのテストファイル

test_calcEndDateを作る
