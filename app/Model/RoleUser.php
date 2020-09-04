<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'User_Role';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id_user', 'id_role'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Model\User', 'id_user');
    }

    public function role() {
        return $this->belongsTo('App\Model\Role', 'id_role');
    }
}
