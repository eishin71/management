<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHome()
    {
        //homeにアクセス
        $response = $this->get('/home');
        //ステータスコード302を返す
        $response->assertStatus(302);
        // loginにリダイレクとする
        $response->assertRedirect('/login');

    }

    public function testHomeLogged()
    {
      //ユーザーのテスト用レコードを1つ作る
      $user = factory(User::class)->create();
      //homeにアクセス
      $response = $this->actingAs($user)->get('/home');
      //ステータスコード２００を返す
      $response->assertStatus(200);
    }

    public function testReservationCreate()
    {
        $response = $this->get('/reservation/create');
        $response->assertStatus(200);
    }

    public function testReservationCreateLogged()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/reservation/create');
        $response->assertStatus(200);
    }

    public function testAdminReservation()
    {
        $response = $this->get('/admin/reservation');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }

    public function testAdminReservationLoggedAdmin()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/admin/reservation');
        $response->assertStatus(200);
    }

    public function testAdminReservationLoggedNotAdmin()
    {
        $user = factory(User::class)->create();
        $user->role = 0;
        $response = $this->actingAs($user)->get('/admin/reservation');
        $response->assertStatus(403);
    }
//顧客一覧のテスト
    public function testAdminClient()
    {
        $response = $this->get('/admin/client');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }

    public function testAdminClientLoggedAdmin()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/admin/client');
        $response->assertStatus(200);
    }

    public function testAdminClientLoggedNotAdmin()
    {
        $user = factory(User::class)->create();
        $user->role = 0;
        $response = $this->actingAs($user)->get('/admin/client');
        $response->assertStatus(403);
    }

}
