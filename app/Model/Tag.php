<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Tag
 *
 * @property int $id
 * @property string|null $label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\ComicworkTag[] $comicworkTag
 * @property-read int|null $comicwork_tag_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $comicworks
 * @property-read int|null $comicworks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereLabel($value)
 * @mixin \Eloquent
 */
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
