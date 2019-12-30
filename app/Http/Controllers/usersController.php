<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');

class UsersController extends Controller
{
  public function show($id)
  {
    $user = Auth::user();
    $users = User::with("items")->find(Auth::user()->id);
    // eval(\Psy\sh());
    
  return view("users/show",compact("users"));
  }

}
