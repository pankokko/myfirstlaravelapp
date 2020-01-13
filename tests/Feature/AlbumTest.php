<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Album;
use App\Item;

class AlbumTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_index()
    {
       //アクセスしたユーザーのアルバムが表示される事

        $user = User::find(1);
        $albums = Album::where("user_id",$user->id)->get();
        $response = $this->actingAs($user)->get('albums/index');
        $response->assertStatus(200);

}

    public function test_new()
    {   $user = User::find(1);
        $response = $this->actingAs($user)->get('albums/new');
        $response->assertStatus(200);

    }

    public function test_show()
    { 
        $user = User::find(1);
        $album = Album::find(1);
        $response = $this->actingAs($user)->get('/albums/1/show');
        $response->assertStatus(200);
    }
    
    public function test_detail()
    {
      $thisalbum = Item::find(1)->albums()->first();
      $item = Item::find(1);
      $pictures = $thisalbum->items->reject($item);
      //eval(\Psy\Sh());

    }

}