<?php

namespace App\Model;

use App\MyStorage\TimeInt;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Model
 * @property $id
 * @property $id_user
 * @property $id_comicwork
 * @property $id_parent
 * @property $id_reply
 * @property $content
 * @property $created_at
 */
class Comment extends Model
{
    protected $table = 'Comments';
    protected $guarded = [];
    public $incrementing = true;
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo('App\Model\User', 'id_user');
    }

    public function reply()
    {
        return $this->belongsTo('App\Model\User', 'id_reply');
    }

    public function comicwork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function isParent()
    {
        return $this->id_parent == 0;
    }

    public function children()
    {
        return Comment::where('id_parent', $this->id)
            ->orderBy('id');
    }

    public function getUser(): User
    {
        return $this->user()->first();
    }

    public function getUserReply(): User
    {
        return $this->reply()->first();
    }

    public function getTimeAgo()
    {
        $time = time() - strtotime($this->created_at);
        return TimeInt::createToStr($time);
    }

    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = null;
}
