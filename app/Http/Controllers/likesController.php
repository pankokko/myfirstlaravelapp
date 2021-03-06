<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Like;
use App\Item;

class likesController extends Controller
{

    public function store(Request $request, $itemId)
    {  
        Like::create(['user_id' => Auth::user()->id,'item_id' => $itemId]);
        return back();
    }

    public function destroy($itemId, $likeId) {
      $item = Item::findOrFail($itemId);
      $item->like_by()->findOrFail($likeId)->delete();  //Itemモデルにあるlike_by()メソッドでユーザーが既にいいねをしているか確認、してしていればそれを削除
      return back();
    }
}
