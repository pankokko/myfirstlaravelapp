<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
protected $fillable = ['path','title'];


public static $rules = array(
  'title' => 'required',
  'path' => 'required'
);

}
