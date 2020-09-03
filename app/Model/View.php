<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'views';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id'];
    public $timestamps = true;

    public const CREATED_AT = 'created_date';


    public function getUser() {
        return $this->belongsTo('App\Model\User', 'id_user');
    }
    public function getChapter() {
        return $this->belongsTo('App\Model\Chapter', 'id_chapter');
    }

    public function getComicwork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }
}
