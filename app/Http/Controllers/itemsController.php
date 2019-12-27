<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
class itemsController extends Controller
{
 

  public function index(request $request)
  { 
     $items =Item::all();
    // eval(\Psy\sh());
     return view("items/index")->with(['items'=>$items]);
     
  }

  public function new(Request $request){
    if(Auth::check()){
      return view("items/new");
    }else{
      return redirect("/register")->with('flash',"*投稿するにはログインか新規登録が必要です*");
    }
  }

  public function create(Request $request){
    if(Auth::check()){
    $user = Auth::user()->id;
      // eval(\Psy\sh());
    $this->validate($request, Item::$rules);
    $path = $request->file('path')->store('public/temp');
    Item::create(['path' => basename($path),'title' => $request->title, 'user_id' =>$user]);
    }
    return redirect('/');
  }
}
