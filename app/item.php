<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
protected $fillable = ['path','title','user_id'];

public function user(){
  return $this->belongsTo('App\User');
}
public static $rules = array(
  'title' => 'required',
  'path' => 'required',
   
);

}
