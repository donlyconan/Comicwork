<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ComicworkTag extends Model
{
    protected $table = 'Comicwork_Tag';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id_tag', 'id_comicwork'];
    public $timestamps = false;

    public function comicwork() {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function tag() {
        return $this->belongsTo('App\Model\Tag', 'id_tag');
    }

}
