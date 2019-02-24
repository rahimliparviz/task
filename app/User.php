<?php

namespace App;

use App\Models\Likes\Like;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function is_liked($cook_id){



        $user_id = Auth::user()->id;
        $cook_id = $cook_id;

        $like = Like::where([['user_id',$user_id],['cook_id',$cook_id]])->first();

        if($like != null){
            return false;
        }else{
            return true;
        }

    }
}
