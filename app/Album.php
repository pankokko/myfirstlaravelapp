<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['path','title','user_id','category_id'];



    public function user(){
        return $this->belongsTo('App\User');
      }
      

}
