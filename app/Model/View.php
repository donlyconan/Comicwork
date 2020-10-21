<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\View
 *
 * @property int $id
 * @property int|null $id_chapter
 * @property int|null $id_user
 * @property int $id_comicwork
 * @property string $created_at
 * @property-read \App\Model\Chapter|null $chapter
 * @property-read \App\Model\Comicwork $comic
 * @property-read \App\Model\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View query()
 * @method static \Illuminate\Database\Eloquent\Builder|View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereIdChapter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereIdComicwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereIdUser($value)
 * @mixin \Eloquent
 */
class View extends Model
{
    protected $table = 'Views';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public const CREATED_AT = 'created_at';


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
