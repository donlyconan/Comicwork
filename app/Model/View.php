<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'Views';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public const CREATED_AT = 'created_date';


    public function user() {
        return $this->belongsTo('App\Model\User', 'id_user');
    }

    public function chapter() {
        return $this->belongsTo('App\Model\Chapter', 'id_chapter');
    }

    public function comicwork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }
}
