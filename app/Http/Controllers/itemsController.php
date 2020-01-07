<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Item;
use Intervention\Image\Facades\Image;
// require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');
class ItemsController extends Controller
{

  public function index(request $request)
  {  
   ;
        //eval(\Psy\sh());
     $items =  Item::getNullStatus()->sortByDesc("created_at")->take(15);
       //eval(\Psy\sh());
     $randoms = Item::getNullStatus()->random(1);
     if($randoms != null){
     return view("items/index",compact("items","randoms"));
     }else{
      return view("items/index"); 
     }
     }


  public function show($id)
  {

    $item = Item::find($id);
    $filteredNull =  Item::userGetNullStatus($id);
     $items = $filteredNull->reject($item)->take(3);
    return view("items/show",compact("item","items"));
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
      $image =  $request->file('path');
      $filename = time() . '.' . $image->getClientOriginalName();
      $path = public_path('/storage/temp/'.$filename);
      Image::make($image)->resize(1616, 1000)->save($path);
      //eval(\Psy\sh());
      Item::create(['path' => basename($path),'title' => $request->title, 'user_id' =>  Auth::user()->id ,'category_id' => $request->category_id ,"status" => $request->status]);
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
