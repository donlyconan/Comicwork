<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\View;
use App\MyStorage\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class TopController extends Controller
{
    //Tim kiem theo danh muc được chỉ định
    public function sort($mode)
    {
        $data = $this->sortByTop($mode);
        $title = $this->getTop()[$mode];
        $comics = Paginator::paginate($data, route('home.sort', compact('mode'))
            , HomeController::PERPAGE);
        return view("home.category.general", compact('comics', 'title'));
    }

    /*
     * Lấy dữ liệu được sắp xếp theo
     * -Ngày,Tuần ,Tháng, Năm, Truyện được yêu thích
     */
    public function sortByTop($top)
    {
        $comics = new Collection();

        switch ($top) {
            case self::TOP_NGAY:
            case self::TOP_TUAN:
            case self::TOP_THANG:
            case self::TOP_NAM:
                $now = Carbon::now();
                $to = $now->endOfDay()->toDateTime();
                $from = $now->startOfDay()->toDateTime();

                if ($top == self::TOP_TUAN) {
                    $to = $now->endOfWeek()->toDateTime();
                    $from = $now->startOfWeek()->toDateTime();
                } elseif ($top == self::TOP_THANG) {
                    $to = $now->endOfMonth()->toDateTime();
                    $from = $now->startOfMonth()->toDateTime();
                } elseif ($top == self::TOP_NAM) {
                    $to = $now->endOfYear()->toDateTime();
                    $from = $now->startOfYear()->toDateTime();
                }

                View::selectRaw('id_comicwork, count(id) as views')
                    ->whereBetween('created_at', [$from, $to])
                    ->groupBy('id_comicwork')
                    ->having('views', '>', 0)
                    ->orderByDesc('views')
                    ->chunk(20, function ($data) use ($comics) {
                        foreach ($data as $view) {
                            $comics->add($view->comicwork()->first());
                        }
                    });
                return $comics;
            case self::TOP_YEU_THICH:
                \DB::table('votes')->selectRaw('id_comicwork, count(*) as votes')
                    ->groupBy('id_comicwork')
                    ->orderByDesc('votes')
                    ->having('votes', '>', 0)
                    ->chunk(20, function ($data) use ($comics) {
                        foreach ($data as $vote) {
                            $comics->add(Comicwork::find($vote->id_comicwork));
                        }
                    });
                return $comics;
            default:
                abort(404);
                return 0;
        }
    }
}
