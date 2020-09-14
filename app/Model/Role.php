<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Role
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $display_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    protected $table = 'roles';
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function users() {
        return $this->belongsToMany('App\Model\User', 'User_role', 'id_role', 'id_user');
    }
}
