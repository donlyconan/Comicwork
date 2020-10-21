<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Model\Image
 *
 * @property int $id
 * @property int $id_chapter
 * @property string|null $url_image
 * @property string|null $content
 * @property-read Image $chapter
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereIdChapter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUrlImage($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    protected $table = 'Images';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dateFormat = 'dd/MM/yyyy';


    public function chapter()
    {
        return $this->belongsTo('App\Model\Image', 'id_chapter', 'id');
    }


    public function url()
    {
        return Storage::url($this->url_image);
    }
}
