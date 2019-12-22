<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class itemsController extends Controller
{
  public function index(Request $request)
  { 
     $items =Item::all();
     return view("items.index", ['items'=>$items]);
     
  }

  public function new(Request $request){
    return view("items/new");
  }

  public function create(Request $request){
    $imagefile = $request->file('path');
    $temp_path = $imagefile->store('public/temp');
    // eval(\Psy\sh());
    return redirect('/');
  }
}
