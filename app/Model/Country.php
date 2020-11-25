<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Country
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $comicworks
 * @property-read int|null $comicworks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    protected $table="Countries";

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


    public function comicworks() {
        return $this->hasMany("App\Model\Comicwork", "id_country");
    }


}
