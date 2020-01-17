<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['description','albumtitle','user_id','thumbnail'];

    public function user(){
        return $this->belongsTo('App\User');
      }
      
    public function items()
      {
        return $this->belongsTomany('App\Item');
      }

public static $rules = array(
  'albumtitle' => 'required',
  'description' => 'required',
  'thumbnail'  =>  'required'
);

}
