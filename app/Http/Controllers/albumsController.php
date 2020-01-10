<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Album;
use App\Item;

// require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');
class AlbumsController extends Controller
{
    public function index(request $request)
    {
      $albums = Album::where("user_id", Auth::id())->get();
        return view("albums/index" , compact("albums"));
    }

    public function add(request $request)
    {
      return view("albums/add");
    }

    public function store(request $request)
    {
      if(Auth::check()){
        $this->validate($request, Item::$rules);
        $album = Album::find($request->id);
        $image =  $request->file('path');
        $filename = time() . '.' . $image->getClientOriginalName();
        $path = public_path('/storage/albumpic/'.$filename);
        Image::make($image)->resize(1616, 1000)->save($path);
        Item::create(['path' => basename($path),'title' => $request->title, 'user_id' =>  Auth::user()->id ,'category_id' => $request->category_id,'status'=> $request->status]);
        $item = Auth::user()->items->last();
        $album->items()->attach(["item_id" => $item->id ]);
        }
        return redirect('albums/index');
        }
    

    public function new(request $request)
    {
      return view("albums/new");
    }

   public function create(request $request)
   {
    if(Auth::check()){
      $this->validate($request, Album::$rules);
      $image =  $request->file('thumbnail');
      $filename = time() . '.' . $image->getClientOriginalName();
      $path = public_path('/storage/thumbnail/'.$filename);
      Image::make($image)->resize(300,300)->save($path);
      Album::create(['thumbnail' => basename($path),'albumtitle' => $request->albumtitle, 'user_id' =>  Auth::user()->id ,'description' => $request->description]);
    }
      return redirect('albums/index');
    }
   
    public function show($id)
    { 
      $album = Album::find($id);
      $albums = $album->items;
      return view("albums/show", compact("album","albums"));
    }


  public function destroy($id)
  {
    $album = Album::findOrFail($id);
    if(Auth::user()->id  == $album->user_id){ 
    Storage::delete('public/albumpic/'.$album->thumbnail);
    $album->delete();
    }
    return redirect('albums/index');
  }



  public function remove($id)
  {
    $item = Item::findOrFail($id);
    if(Auth::id() == $item->user_id){ 
    Storage::delete('public/albumpic/'.$item->path);
    $item->delete();
    }
    return redirect('albums/index');
  }

    public function detail($id)
  {      
      $thisalbum = Item::find($id)->albums()->first();
      $album = Item::find($id);
      $pictures = $thisalbum->items->reject($album);
        //eval(\Psy\sh());
      return view("albums/detail",compact("album","pictures","thisalbum"));
    }
   }

