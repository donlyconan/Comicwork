<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function comicworks() {
        return $this->belongsToMany('App\Model\Comicwork', 'Comicwork_tag'
            , 'id_tag', 'id_comicwork');
    }

    public function comicworkTag() {
        return $this->hasMany('App\Model\ComicworkTag', 'id_tag');
    }
}
