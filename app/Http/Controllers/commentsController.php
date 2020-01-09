<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Item;


class commentsController extends Controller
{
  public function create(request $request)
 {

   if(Auth::check()){
   $this->Validate($request , Comment::$rules);
    $user = Auth::user()->id;
    $item_id  = $request->id;
    Comment::create(["comment" => $request->comment, "user_id" => $user, "item_id" => $item_id]);
    
   }
   return redirect("items/new");
 }
    
}
