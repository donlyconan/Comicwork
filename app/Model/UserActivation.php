<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Passport;
use function GuzzleHttp\json_encode;

class UserActivation extends Model
{
    protected $table = 'user_activations';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = true;
    protected $guarded = [];
    public $incrementing = false;


    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    //Tạo mã truy cập
    public function accessToken()
    {
        return \Crypt::encryptString(json_encode($this));
    }

    public function createToken($name)
    {
        while (UserActivation::find(($code = \Str::random(100))) != null) ;
        $this->id = $code;
        $this->name = $name;
        return $this;
    }

    public function token()
    {
        return \Crypt::encryptString($this->id);
    }


}
