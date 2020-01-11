<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;
class Like extends Model
{
    use CounterCache;

    public $counterCacheOptions = [
        'Item' => [
            'field' => 'likes_count',
            'foreignKey' => 'item_id'
        ]
    ];

    protected $fillable = ['user_id', 'item_id'];

    public function Item()
    {
      return $this->belongsTo('App\Item');
    }

    public function User()
    {
      return $this->belongsTo('App\User');
    }
    
}
