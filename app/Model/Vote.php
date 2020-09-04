<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'Votes';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id_user', 'id_comicwork'];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\Model\User', 'id_user');
    }

    public function comicwork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

}
