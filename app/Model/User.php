<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'Users';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function follows()
    {
        return $this->hasMany('App\Model\Follow', 'id_user');
    }

    public function votes()
    {
        return $this->hasMany('App\Model\Vote', 'id_user');
    }

    public function notifications()
    {
        return $this->hasMany('App\Model\Notification', 'id_user');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'User_Role'
            , 'id_user', 'id_role');
    }

    public function histories()
    {
        return $this->hasMany('App\Model\History', 'id_user');
    }

    public function views()
    {
        return $this->hasMany('App\Model\View', 'id_user');
    }

    public function follow_comicworks() {
        return $this->belongsToMany('App\Model\Comicwork', 'Follows'
            , 'id_user', 'id_comicwork');
    }


    public function view_comicworks() {
        return $this->belongsToMany('App\Model\Comicwork', 'Views'
            , 'id_user', 'id_comicwork');
    }

}
