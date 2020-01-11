<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Like;
use App\Item;



class likesController extends Controller
{

    public function store(Request $request, $id)
    {  
        // eval(\Psy\Sh());
        Like::create(['user_id' => Auth::user()->id,'item_id' => $id]);
        // $item = Item::findOrFail($id);
        return back();
    }

    public function destroy($id, $likeId) {
      $item = Item::findOrFail($id);
      $item->like_by()->findOrFail($likeId)->delete();
    
      return back();
    }
}
