<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'Follows';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id_user', 'id_comicwork'];
    public $timestamps = true;
    protected $dateFormat = 'dd/MM/yyyy';

    public const CREATED_AT = 'follow_date';


    public function comicwork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'id_user');
    }

}
