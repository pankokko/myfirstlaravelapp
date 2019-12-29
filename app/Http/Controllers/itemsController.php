<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Item;
require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');
class itemsController extends Controller
{
 

  public function index(request $request)
  { 
     $items =Item::all();
     $randoms = Item::all()->random(1);
      // eval(\Psy\sh());
     return view("items/index")->with(['items' => $items, 'randoms' => $randoms]);
  }

  public function show($id)
  {
    $user = Item::find($id)->user;
    // eval(\Psy\sh());
    $item = Item::find($id);
    $items = Item::find($id)->user->items->reject($item)->take(3);
    return view("items/show")->with(['item' => $item, 'user' => $user , 'items' => $items ]);
  }

  public function destroy($id)
  {
    $item = Item::findOrFail($id);
    Storage::delete('public/temp/'.$item->path);
    $item->delete();
    return redirect('/');
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
    $this->validate($request, Item::$rules);
    $path = $request->file('path')->store('public/temp');
    Item::create(['path' => basename($path),'title' => $request->title, 'user_id' => $user]);
    // eval(\Psy\sh());
  
    }
    return redirect('/');
  }
}
