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

public static $rules = array(
  'title' => 'required',
  'path' => 'required',
  'category_id' => 'required',
  'user_id' => 'required'
);

}
