<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Item;
require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');
class ItemsController extends Controller
{
 

  public function index(request $request)
  { 
     $items =Item::all();
     $randoms = Item::all()->random(1);
     return view("items/index",compact("items","randoms"));
  }

  public function show($id)
  {
    $item = Item::find($id);
    $items = Item::find($id)->user->items->reject($item)->take(3);
     // eval(\Psy\sh());
    return view("items/show",compact("item","user","items"));
  }

  public function destroy($id)
  {
    $item = Item::findOrFail($id);
    if(Auth::user()->id  == $item->user_id){ 
    Storage::delete('public/temp/'.$item->path);
    $item->delete();
    }
    return redirect('/');
  }

  public function new(Request $request){
    $item = $request->content;
    //  eval(\Psy\sh());
    if(Auth::check()){
      return view("items/new");
    }else{
      return redirect("/register")->with('flash',"*投稿するにはログインか新規登録が必要です*");
    }
  }

  // public function sort(request $request)
  //  {
  //    return view("items/sort");
  //  }

  //  public function search(request $request)
  //  {
  //    $id = $request->category_id;
  //   $check = Item::all()->find($id == "category_id");
  //    eval(\Psy\sh());
  //    $sort  = Item::find($id)->category->items;
  //    return redirect("/");
  //  }

  public function create(Request $request){
    if(Auth::check()){
    $user = Auth::user()->id;
    $this->validate($request, Item::$rules);
    $path = $request->file('path')->store('public/temp');
    Item::create(['path' => basename($path),'title' => $request->title, 'user_id' => $user ,'category_id' => $request->category_id]);
    // eval(\Psy\sh());
    }
    return redirect('/');
  }
}
