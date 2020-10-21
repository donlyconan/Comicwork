<?php

namespace App\Http\Controllers;

use App\Model\Comicwork;
use App\Model\Country;
use App\Model\Notification;
use App\Model\Tag;
use App\MyStorage\FileSystem;
use App\Render\NotificationRender;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const TOP_NGAY = 'top-ngay', TOP_TUAN = 'top-tuan', TOP_THANG = 'top-thang'
    , TOP_NAM = 'top-nam', TOP_YEU_THICH = 'top-yeu-thich';

    public function __construct()
    {
        //chia sẻ dữ liệu
        $this->shareValue();
    }


    private function shareValue()
    {
        FileSystem::makeIfNotExists();
        \View::share("categories", Tag::all());
        \View::share("countries", Country::all());
        \View::share("publishYear", $this->getPulishYear());

        $top = $this->getTop();
        \View::share(compact('top'));
    }

    public static function getTop(): \Illuminate\Support\Collection
    {
        return collect([self::TOP_NGAY => 'Top Ngày', self::TOP_TUAN => 'Top Tuần', self::TOP_THANG => 'Top Tháng'
            , self::TOP_NAM => 'Top Năm', self::TOP_YEU_THICH => 'Top Yêu Thích']);
    }

    //Lấy năm phát hành
    public static function getPulishYear()
    {
        return Comicwork::selectRaw("Year(publishing_year) as year")->distinct()->get();
    }
}
