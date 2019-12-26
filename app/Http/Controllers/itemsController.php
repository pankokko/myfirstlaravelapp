<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class itemsController extends Controller
{
  public function index(request $request)
  { 
     $items =Item::all();
    // eval(\Psy\sh());
     return view("items.index", ['items'=>$items]);
     
  }

  public function new(Request $request){
    return view("items/new");
  }

  public function create(Request $request){
    
    if ($request->isMethod('POST')) {
      $path = $request->file('path')->store('public/temp');
      Item::create(['path' => basename($path)]);
  }
    return redirect('items/index');
  }
}
