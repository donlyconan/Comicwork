<?php

namespace App\Model;


use App\MyStorage\TimeInt;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Comicwork
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int $id_country
 * @property string|null $author
 * @property int|null $status
 * @property string|null $publishing_company
 * @property string $publishing_year
 * @property string|null $url_image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Chapter[] $chapters
 * @property-read int|null $chapters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\ComicworkTag[] $comicwork_tag
 * @property-read int|null $comicwork_tag_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Follow[] $follows
 * @property-read int|null $follows_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\History[] $histories
 * @property-read int|null $histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users_follow
 * @property-read int|null $users_follow_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users_view
 * @property-read int|null $users_view_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\View[] $views
 * @property-read int|null $views_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereIdCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork wherePublishingCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork wherePublishingYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comicwork whereUrlImage($value)
 * @mixin \Eloquent
 * @property-read \App\Model\Country|null $country
 */
class Comicwork extends Model
{
    protected $table = 'Comicworks';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dateFormat = 'dd/MM/yyyy';


    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag', 'Comicwork_tag'
            , 'id_comicwork', 'id_tag');
    }


    public function follows()
    {
        return $this->hasMany('App\Model\Follow', 'id_comicwork');
    }

    public function users()
    {
        return $this->belongsToMany('App\Model\User', 'Follows'
            , 'id_comicwork', 'id_user');
    }


    public function views()
    {
        return $this->hasMany('App\Model\View', 'id_comicwork');
    }

    public function chapters()
    {
        return $this->hasMany('App\Model\Chapter', 'id_comicwork');
    }

    public function histories()
    {
        return $this->hasMany('App\Model\History', 'id_comicwork');
    }


    public function votes()
    {
        return $this->hasMany('App\Model\Vote', 'id_comicwork');
    }

    public function country()
    {
        return $this->belongsTo('App\Model\Country', 'id_country');
    }

    public function comicwork_tag()
    {
        return $this->hasMany('App\Model\ComicworkTag', 'id_comicwork');
    }

    public function user_follow()
    {
        return $this->belongsToMany('App\Model\User', 'Follows'
            , 'ic_comicwork', 'id_user');
    }


    public function user_view()
    {
        return $this->belongsToMany('App\Model\User', 'Views'
            , 'id_comicwork', 'id_user');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment', 'id_comicwork');
    }


    //trả về tên các trường của Model
    public static function columns()
    {
        return ['comicworks.id', 'name', 'description', 'id_country', 'author', 'comicworks.status', 'publishing_company', 'publishing_year', 'url_image'];
    }


    //Đếm số chương ra mắt
    public function countChapters()
    {
        return self::leftJoin("Chapters", "Chapters.id_comicwork", '=', 'comicworks.id')
            ->where("comicworks.id", '=', $this->id)
            ->count("Chapters.id");
    }


    //lấy chương truyện mới nhất của đoạn truyện
    public function latestChapter()
    {
       return $this->chapters()->orderBy('chapter_number', 'desc')->first();
    }

    /*
     * kiểm tra trạng thái của bộ truyện
     * status: 0 đang cập nhật
     *         1 đã hoàn thành
     */
    public function isUpdating()
    {
        return $this->status == 0;
    }

    /**
     * Trả về ảnh đại diện của bộ truyện
     */
    public function profile()
    {
        return $this->url_image ?? \Storage::url('public/comicwork/test/comic_profile.jpg');
    }
}
