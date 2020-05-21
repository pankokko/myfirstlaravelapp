<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

use App\User;


class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
 


    // public function testDatabase()
    // {
    //     //テーブル内にあるデータを呼び出せるか
    
    //     $this->assertDatabaseHas('users', [
    //         'name' => 'ぱんこっこ',
    //         'email' => 'ccc@ccc.com',
    //         'password' => '09210921'
    //     ]);
    // }



    public function test_show()
    {
       //指定したユーザーでログイン後のページにアクセス出来る事。

       $user = User::find(1);
       $response = $this->actingAs($user)->get('users/1/show');
       $response->assertStatus(200);
        
       $this->assertTrue(Auth::check());


    }

}
