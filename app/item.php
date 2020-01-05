<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
protected $fillable = ['path','title','user_id','category_id'];

public function user(){
  return $this->belongsTo('App\User');
}

public function category(){
  return $this->belongsTo('App\Category');
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
