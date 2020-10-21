<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

/**
 * App\Model\User
 * @property int $id
 * @property string|null $username
 * @property string|null $url_image
 * @property string|null $phone
 * @property string|null $password
 * @property string|null $full_name
 * @property string|null $profile
 * @property string|null $email
 * @property int|null $sexs
 * @property string|null $date_of_birth
 * @property string|null $address
 * @property string|null $remember_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $follow_comicworks
 * @property-read int|null $follow_comicworks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Follow[] $follows
 * @property-read int|null $follows_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\History[] $histories
 * @property-read int|null $histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Notification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Comicwork[] $view_comicworks
 * @property-read int|null $view_comicworks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\View[] $views
 * @property-read int|null $views_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Vote[] $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSexs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUrlImage($value)
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public const STT_BLOCK = -1;
    public const STT_NOT_AVAILABLE = 0;
    public const STT_SOCIAL = 3;
    public const STT_AVAILABLE = 1;


    protected $table = 'Users';
    public $incrementing = true;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $attributes = ["url_image" => "/public/user/avatar.png"];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function follows()
    {
        return $this->hasMany('App\Model\Follow', 'id_user');
    }

    public function votes()
    {
        return $this->hasMany('App\Model\Vote', 'id_user');
    }

    public function notifications()
    {
        return $this->hasMany('App\Model\Notification', 'id_user');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'User_Role'
            , 'id_user', 'id_role');
    }

    public function histories()
    {
        return $this->hasMany('App\Model\History', 'id_user');
    }

    public function views()
    {
        return $this->hasMany('App\Model\View', 'id_user');
    }

    public function follow_comicworks()
    {
        return $this->belongsToMany('App\Model\Comicwork', 'Follows'
            , 'id_user', 'id_comicwork');
    }


    public function view_comicworks()
    {
        return $this->belongsToMany('App\Model\Comicwork', 'Views'
            , 'id_user', 'id_comicwork');
    }


    public function role_user()
    {
        return $this->belongsTo('App\Model\RoleUser', 'id_user'
            , 'user');
    }

    /**
     * kiểm tra quyền người dùng là admin
     */
    public function isAdmin(): bool
    {
        return $this->hasPermission(1);
    }


    /**
     * Kiểm tra quyền người dùng là User
     */
    public function isUser(): bool
    {
        return $this->hasPermission(2);
    }

    /**
     * Kiểm tra một người dùng có một nhóm quyền nào đó hay không
     */
    public function hasPermission(...$permission): bool
    {
        return $this->roles()->whereIn('id', $permission)->count() > 0;
    }

    /**
     * kiểm tra tài khoản còn có ở trạng thái hoạt động hay không
     *  0    : Chưa kích hoạt
     * -1   : Trạng thái block
     *  1    : Trạng thái hoạt động
     */
    public function activated(): bool
    {
        return $this->status == self::STT_AVAILABLE || $this->status == self::STT_SOCIAL;
    }


    /**
     * Trả về ảnh đại diện của người dùng
     */
    public function profile(): string
    {
        if ($this->url_image != null && str_starts_with($this->url_image, 'http'))
            return $this->url_image;

        return \Storage::exists($this->url_image) ? Storage::url($this->url_image)
            : \Storage::url('user/avatar.png');
    }

    /**
     * Kiem tra theo doi bo truyen co id?
     */
    public function hasFollow($id_comic)
    {
        return $this->follows()->where('id_comicwork', $id_comic)
                ->first() != null;
    }


    /**
     * Kiem tra nguoi dung co thich bo truyen co id_comic hay khong
     */
    public function hasVote($id_comic)
    {
        return $this->votes()->where('id_comicwork', $id_comic)
                ->first() != null;
    }


    //Tạo token thay thế cho tự động đăng nhập
    public function createRememberToken()
    {
        while (self::whereRememberToken(($code = Str::random(100)))->first() != null);
        $this->remember_token = $code;
        $this->save();
        return $this->remember_token;
    }


//    public function findForPassport($username) {
//        return $this->where('username', $username)->first();
//    }

}
