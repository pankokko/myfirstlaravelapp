<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class itemsController extends Controller
{
  public function index(Request $request)
  {
     return view("items/index");
  }

  public function new(Request $request){
    return view("items/new");
  }
}
