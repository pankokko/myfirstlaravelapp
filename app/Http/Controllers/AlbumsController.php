<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Album;
require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');
class AlbumsController extends Controller
{
    public function index(request $request)
    {
      $albums = Album::all();
        return view("albums/index" , compact("albums"));
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
          Image::make($image)->resize(300, 300)->save($path);
          //eval(\Psy\sh());
          Album::create(['thumbnail' => basename($path),'albumtitle' => $request->albumtitle, 'user_id' =>  Auth::user()->id ,'description' => $request->description]);
       }
          return redirect('/');
    }
   
    public function show($id)
    {
      $album =  Album::find($id);
      return view("albums/show", compact("album"));
    }

   }

