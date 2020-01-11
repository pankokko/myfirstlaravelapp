<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
protected $fillable = ['path','title','status','user_id','category_id'];

public function user(){
  return $this->belongsTo('App\User');
}

public function category(){
  return $this->belongsTo('App\Category');
}

public function comments(){
  
  return $this->hasmany("App\Comment");
}

public function albums()
{
  return $this->belongsTomany('App\Album');
}

public function likes()
{
  return $this->hasMany('App\Like');
}

public function like_by()
{
  return Like::where('user_id', Auth::id())->first();
}



public static function getNullStatus()
{
  $status = self::wherenull("status")->get();
  return $status;
}

public static function userGetNullStatus($id){

  $filtered = self::find($id)->user->items->reject(function($values, $key){
    return ($values['status'] == "onlyalbum"); 
    });
    return $filtered;
}


public static $rules = array(
  'title' => 'required',
  'path' => 'required',
  
);

}
