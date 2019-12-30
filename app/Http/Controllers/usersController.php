<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Item;
require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');

class UsersController extends Controller
{
  public function show($id)
  {
    $user = Auth::user();
    $users = User::with("items")->find(Auth::user()->id);
 
  return view("users/show",compact("users"));
  }

  public function search($category_id)
  {
    $category_id = $request->category_id;
    eval(\Psy\sh());
    $sort  = Item::find($category_id)->category->items;
   
    return redirect("/");
  }


}
