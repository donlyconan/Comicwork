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


    public function comicwrork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function  chapter() {
        return $this->belongsTo('App\Model\Chapter', 'id_chapter');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'id_user');
    }
}
