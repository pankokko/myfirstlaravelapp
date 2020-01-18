<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;


class CommentsController extends Controller
{
  
  public function create(request $request)
 {
   if(Auth::check()){
     $this->Validate($request , Comment::$rules);
      $user = Auth::user()->id;
      $item_id  = $request->id;
      Comment::create(["comment" => $request->comment, "user_id" => $user, "item_id" => $item_id]);

      return back();
   }else{
      return redirect("/register")->with('flash',"*投稿するにはログインか新規登録が必要です*");
   }
 
 }

 public function destroy($id)
 {
  $user_id = Comment::find($id)->user->id;
   if(Auth::user()->id ==  $user_id){
     $item = Comment::find($id);
     $item->delete();
   }
   return back();
 }

 


}
