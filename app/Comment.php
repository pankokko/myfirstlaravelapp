<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ["user_id","item_id","comment"];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function item()
    {
        return $this->belongsTo("App\Item");
    }



public static $rules = array(
    'comment' => 'required',
  );
}
