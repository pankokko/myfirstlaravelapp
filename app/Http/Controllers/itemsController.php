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

    $item = new Item;
    $form = $request->all();
    unset($form['_token']);
    $item->fill($form)->save();
    return redirect('/');
  }
}
