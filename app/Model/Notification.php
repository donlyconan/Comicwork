<?php

namespace App\Model;


use App\MyStorage\TimeInt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\json_decode;

/**
 * App\Model\Notification
 *
 * @property int $id
 * @property int|null $id_user
 * @property string|null $title
 * @property string|null $content
 * @property string|null $url
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Model\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUrl($value)
 * @mixin \Eloquent
 */
class Notification extends Model
{
    protected $table = 'Notifications';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo('App\Model\User', 'id_user');
    }

    public function userLink(): User
    {
        return User::find($this->content()->id_user);
    }

    public function comicLink(): Comicwork
    {
        return Comicwork::find($this->content()->id_comic);
    }

    public function chapterLink(): Chapter
    {
        return Chapter::find($this->content()->id_chapter);
    }


    public function content()
    {
        return json_decode($this->content);
    }

    public function toTime(): string
    {
        return TimeInt::create(time() - strtotime($this->updated_at))->convertIf(2 * 24 * 3600);
    }
}
