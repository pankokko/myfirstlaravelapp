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
     //eval(\Psy\sh());
     $items =Item::orderby("created_at" ,"desc")->take(15)->get();
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
      //eval(\Psy\sh());
    if(Auth::check()){
      return view("items/new");
    }else{
      return redirect("/register")->with('flash',"*投稿するにはログインか新規登録が必要です*");
    }
  }


  public function create(Request $request){
    if(Auth::check()){
    $this->validate($request, Item::$rules);
    $path = $request->file('path')->store('public/temp');
    Item::create(['path' => basename($path),'title' => $request->title, 'user_id' =>  Auth::user()->id ,'category_id' => $request->category_id]);
    // eval(\Psy\sh());
    }
    return redirect('/');
  }

  public function search(request $request)
  {
  
    $keyword = $request->input("keyword");
    $query = Item::where('title', 'LIKE', "%{$keyword}%")->get();
      //eval(\Psy\sh());
    return view("items/search",compact("query","keyword"));
  }

}
