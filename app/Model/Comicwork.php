<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Comicwork extends Model
{
    protected $table = 'Comicworks';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dateFormat = 'dd/MM/yyyy';


    public function tags() {
        return $this->belongsToMany('App\Model\Tag', 'Comicwork_tag'
            , 'id_comicwork', 'id_tag');
    }


    public function follows() {
        return $this->hasMany('App\Model\Follow', 'id_comicwork');
    }

    public function users() {
        return $this->belongsToMany('App\Model\User', 'Follows'
            , 'id_comicwork', 'id_user');
    }


    public function views() {
        return $this->hasMany('App\Model\View', 'id_comicwork');
    }

    public function chapters() {
        return $this->hasMany('App\Model\Chapter', 'id_comicwork');
    }

    public function histories() {
        return $this->hasMany('App\Model\History', 'id_comicwork');
    }


    public function votes() {
        return $this->hasMany('App\Model\Vote', 'id_comicwork');
    }

    public function comicwork_tag() {
        return $this->hasMany('App\Model\ComicworkTag', 'id_comicwork');
    }

    public function users_follow() {
        return $this->belongsToMany('App\Model\User', 'Follows'
            , 'ic_comicwork', 'id_user');
    }


    public function users_view() {
        return $this->belongsToMany('App\Model\User', 'Views'
            , 'id_comicwork', 'id_user');
    }
}
