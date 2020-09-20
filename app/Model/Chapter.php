<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Model\Chapter
 *
 * @property int $id
 * @property int $id_comicwork
 * @property int|null $chapter_number
 * @property string|null $title
 * @property string $created_at
 * @property string $updated_at
 * @property-read \App\Model\Comicwork $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\View[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereChapterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereIdComicwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $release_date
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereReleaseDate($value)
 */
class Chapter extends Model
{
    //ten bang co so du lieu Mac dinh: Model+s (chapters)
    protected $table = 'chapters';
    protected $dateFormat = 'dd/MM/yyyy';

    /**
     * Nhung truong bi gioi han truy cap theo cach "Chon toan bo"
     * @var string[]
     */
    protected $guarded = ['title', 'chapter'];

    /**
     * cac truong la id cua bang: default 'id'
     * @var string[]
     */
    public $primaryKey = 'id';

    /**
     * Cho phep truong id tu dong tang ma khong can su can thiep cua lap trinh vien
     */
    public $incrementing = true;

    /**
     * Dinh dang lai kieu du lieu cho khoa chinh
     * @var bool
     */
    //protected $keyType = 'int';

    /*
     * che do nay khong cho phep laravel can thiep vai cac truong created_at, updated_at
     * thay vao do lap tri
    */
    public $timestamps = false;


    /**
     * Thiet lap gia tri mac dinh cho mo hinh
     */
    protected $attributes = ['chapter' => 'Unknown'];

    /**
     * Cac truong lien quan den thoi gian mac dinh la
     * 'created_at', 'updated_at'
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function comicwork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function images()
    {
        return $this->hasMany('App\Model\Image', 'id_chapter');
    }


    public function views()
    {
        return $this->hasMany('App\Model\View', 'id_chapter');
    }


}
