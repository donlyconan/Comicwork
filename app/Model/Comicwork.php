<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Comicwork extends Model
{
    protected $table = 'Comicworks';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id'];
    protected $dateFormat = 'dd/MM/yyyy';


    public function getTags() {
        $this->belongsToMany('App\Model\Tag', 'Comicwork_tag', 'id_comicwork', 'id_tag');
    }

    public function getFollows() {
        return $this->hasMany('App\Model\Follow', 'id_comicwork', 'id');
    }


    public function getViews() {
        return $this->hasMany('App\Model\View', 'id_comicwork', 'id');
    }

    public function getChapters() {
        return $this->hasMany('App\Model\Chapter', 'id_comicwork', 'id');
    }

    public function getHistories() {
        return $this->hasMany('App\Model\History', 'id_comicwork', 'id');
    }


    public function getVotes() {
        return $this->hasMany('App\Model\Vote', 'id_comicwork', 'id');
    }
}
