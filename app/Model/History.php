<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class History
 * @package App\Model
 * @property id_comicwork
 */
class History extends Model
{
    protected $table = 'Histories';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = ['id_user', 'id_comicwork'];
    public $timestamps = true;
    protected $dateFormat = 'd-m-Y';


    public function comicwork()
    {
        return $this->belongsTo('App\Model\Comicwork', 'id_comicwork');
    }

    public function chapter()
    {
        return $this->hasOne('App\Model\Chapter', 'id_chapter');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'id_user');
    }


    /**
     * Set the keys for a save update query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

    /**
     * Kiểm tra trạng thái đã xem của tin nhắn
     */
    public function seen(): bool
    {
        return $this->status == 1;
    }
}
