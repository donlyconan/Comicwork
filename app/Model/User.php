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


    public function getFollows() {
        return $this->hasMany('App\Models\Follow','id_user', 'id');
    }

    public function getVotes() {
        return $this->hasMany('App\Models\Vote','id_user', 'id');
    }

    public function getNotifications() {
        return $this->hasMany('App\Models\Notification','id_user', 'id');
    }

    function getRoles() {
        return $this->belongsToMany('App\Models\Role', 'User_Role', 'id_user', 'id_role');
    }

    function getHistories() {
        return $this->hasMany('App\Models\History', 'id_user', 'id');
    }

    function getViews() {
        return $this->hasMany('App\Models\View', 'id_user', 'id');
    }

}
