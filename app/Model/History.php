<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'Histories';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id_user', 'id_comicwork'];
    public $timestamps = true;
    protected $dateFormat = 'dd/MM/yyyy';


    public function getComicwrork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function getUser()
    {
        return $this->belongsTo('App\Model\User', 'id_user');
    }
}
