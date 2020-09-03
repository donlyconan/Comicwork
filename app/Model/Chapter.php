<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //ten bang co so du lieu Mac dinh: Model+s (chapters)
    protected $table = 'chapter';
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
    public $primaryKey = ['id'];

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



}
