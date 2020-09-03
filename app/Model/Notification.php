<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id'];
    public $timestamps = true;
    protected $dateFormat = 'dd/MM/yyyy';


    public function getUser() {
        return $this->belongsTo('App\Model\User', 'id_user');
    }
}
