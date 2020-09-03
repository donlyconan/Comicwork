<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id'];
    public $timestamps = false;

    public function getUsers() {
        return $this->belongsToMany('App\Model\User', 'User_role', 'id_role', 'id_user');
    }
}
