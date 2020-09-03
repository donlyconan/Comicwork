<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class TagComicwork extends Model
{
    protected $table = 'tagcomicwork';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id_comicwork', 'id_tag'];
    public $timestamps = false;

    public function getComicwork() {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function getTag() {
        return $this->belongsTo('App\Model\Tag', 'id_tag');
    }

}
