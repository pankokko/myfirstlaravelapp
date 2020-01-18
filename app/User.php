<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profilepic'
    ];

    public function items(){
        return $this->hasmany('App\Item');
    }

    public function comments(){
        return $this->hasmany('App\Comment');
      }

    public function albums(){
        return $this->hasmany('App\Album');
      }
      
      public function likes()
      {
        return $this->hasMany('App\Like');
      }

      

    public static $rules = array(
      'profilepic' => 'required',
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
