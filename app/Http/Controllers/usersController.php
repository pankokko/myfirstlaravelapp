<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Item;
// require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');

class UsersController extends Controller
{

  
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show($id)
  {
    $item = Item::wherenull("status")->get();
    $users = $item->where("user_id",Auth::user()->id);
   // eval(\Psy\sh());
    return view("users/show",compact("users"));
  }



}
