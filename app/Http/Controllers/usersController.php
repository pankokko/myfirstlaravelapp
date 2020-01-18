<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Item;
use Intervention\Image\Facades\Image;
class UsersController extends Controller
{

  
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show($id)
  {
    $albumcount = User::find(Auth::id())->albums->count();
    $userpic = User::find(Auth::id())->profilepic;
    $item = Item::wherenull("status")->get();
    $users = $item->where("user_id",Auth::user()->id);

    return view("users/show",compact("users","albumcount","userpic"));
  }


  public function edit(Request $request)
  {
      $this->validate($request, User::$rules);
      $user =  User::find(Auth::id());
      $image = $request->file("profilepic");
      $filename = time() . '.' . $image->getClientOriginalName(); //アップロードファイルを元々の名前と同じものに変更
      $userpic = public_path('/storage/userpic/'.$filename);
      Image::make($image)->resize(350, 220)->save($userpic);
      User::find(Auth::id())->update(["profilepic" => basename($userpic)]);

      return back();
  
    }
   



}
