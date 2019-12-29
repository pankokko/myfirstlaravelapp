<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');

class usersController extends Controller
{
  public function show($id)
  {
    $users = User::with("items")->find(Auth::user()->id);
   // eval(\Psy\sh());
    
  return view("users/show")->with(["users" => $users]);
  }

}
