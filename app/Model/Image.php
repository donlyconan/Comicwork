<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'Images';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dateFormat = 'dd/MM/yyyy';


    public function chapter() {
       return $this->belongsTo('App\Model\Image', 'id_chapter', 'id');
    }
}
