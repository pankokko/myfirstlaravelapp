<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
protected $fillable = ['path','title','status','user_id','category_id'];

public function user(){
  return $this->belongsTo('App\User');
}

public function category(){
  return $this->belongsTo('App\Category');
}

public static function getNullStatus()
{
  $status = self::wherenull("status")->get();
    // eval(\Psy\sh());
    return $status;
}

public static function userGetNullStatus($id){

  $filtered = self::find($id)->user->items->reject(function($values, $key){
  
    return ($values['status'] == "onlyalbum"); 
      
    });

    return $filtered;

 
}

public function albums()
{
  return $this->belongsTomany('App\Album');
}

public static $rules = array(
  'title' => 'required',
  'path' => 'required',
  
);

}
