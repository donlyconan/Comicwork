<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Chapter;
use App\Model\Comicwork;
use App\Model\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use PHPUnit\Exception;
use function GuzzleHttp\Psr7\str;

class HomeController extends Controller
{
    const PERPAGE = 24;
    const LIMIT_COMIC = 18;
    const ONE_DAY = 24 * 60 * 60;


    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Tải trang chủ với các danh mục truyện được lựa chọn
     * 1. Thống kê danh sách truyện mới
     *      Top truyện mới cập nhật
     * 2.   Top truyện thịnh hành
     * 3.   Top truyện yêu thích
     * 4. Xếp top truyện đề cử
     * 5. Thống kê danh sách truyện sẽ được cập nhật trong ngày
     */
    public function index()
    {
        // Danh mục
        $topFav = new Collection();
        $topView = new Collection();
        $topUpdate = new Collection();

        //1. Sắp xếp theo danh mục mới cập nhật
        Chapter::selectRaw("id_comicwork, max(to_seconds(release_date)) as time")
            ->orderByDesc("time")
            ->whereDate('release_date', '<=', Carbon::now()->toDateTime())
            ->groupBy("id_comicwork")
            ->limit(self::LIMIT_COMIC)
            ->get()->each(function ($item) use ($topUpdate) {
                $topUpdate->add(Comicwork::find($item->id_comicwork));
            });

        //2. Sắp xếp theo danh mục yêu thích cập nhật
        \DB::table('votes')
            ->selectRaw("id_comicwork, count(id_user) as totalVote")
            ->groupBy("id_comicwork")
            ->limit(self::LIMIT_COMIC)
            ->orderBy('totalVote', 'desc')
            ->get()->each(function ($item) use ($topFav) {
                $topFav->add(Comicwork::find($item->id_comicwork));
            });

        //3. Sắp xếp theo danh mục top truyện thịnh hành được cập nhật theo tuần
        $startOfWeek = Carbon::now()->startOfWeek()->toDateTime();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateTime();


        \DB::table('views')
            ->selectRaw('id_comicwork, id_chapter, count(id) as views')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy(["id_comicwork", "id_chapter"])
            ->orderByDesc('views')
            ->limit(self::LIMIT_COMIC)
            ->get()->each(function ($item) use ($topView) {
                if (!$topView->has($item->id_comicwork)) {
                    $comic = Comicwork::find($item->id_comicwork);
                    $comic->current_chapter = Chapter::find($item->id_chapter);
                    $comic->views = $item->views;
                    $topView->put($comic->id, $comic);
                }
            });

        //4. Danh sách chương truyện được xem nhiều nhất
        $topComic = $this->loadTopComic();

        //5. Thống kê danh sách truyện được cập nhật trong ngày
        $startOfDay = Carbon::now()->startOfDay()->toDateTime();
        $endOfDay = Carbon::now()->endOfDay()->toDateTime();

        $release = Chapter::whereBetween('release_date', [$startOfDay, $endOfDay])
            ->orderBy('release_date')
            ->limit(20)
            ->get();

        return view('home.content.index')
            ->with(compact('topUpdate', 'topComic', 'topFav', 'topView', 'release'));
    }


    /*
     *  Xếp top danh sách truyện
     */
    public function loadTopComic(): Collection
    {
        $top = ['center_1', 'center_2', 'lup', 'ldown', 'rup', 'rdown'];
        $topComic = new Collection();
        $index = 0;

        $data = Comicwork::cursor()->sort(function ($u, $v) {
            return HomeController::eval($v)
                - HomeController::eval($u);
        })->take(count($top));

        foreach ($data as $comic) {
            // Liệt kê danh sách tags
            $str_tag = '';
            $count = $comic->tags()->count();

            foreach ($comic->tags()->cursor() as $i => $item) {
                $str_tag .= $item->label . ($i >= $count - 1 ?: ', ');
            }

            $lab = $top[$index];
            $index += 1;

            $topComic->$lab = (object)[
                'url_image' => $comic->profile(),
                'name' => $comic->name,
                'chapter' => $comic->latest()->chapter_number,
                'description' => $comic->description,
                'tags' => $str_tag,
                'url' => route('comic.chapter', ['id' => $comic->id, 'chapter' => $comic->latest()->id])
            ];
        }

        return (object)$topComic;
    }


    /**
     * Ham danh gia tinh so diem cua 1 bo truyen
     *      eval = (f+v) - (d/c)
     * voi:
     *      c: la hang so = 8
     *      v: so view
     *      f: so luot yeu thich
     *      d: so giay tinh tu ngay dang
     *
     * Lay 21600 views hoac like lam moc chuan cho 1 ngay
     * @param $views
     * @param $id
     */
    public static function eval(Comicwork $comic)
    {
        $f = $comic->votes()->count();
        $v = $comic->views()->count();
        $c = 8;
        $d = time() - strtotime($comic->oldest()->release_date);
        return ($f + $v) - round($d / $c, 0, PHP_ROUND_HALF_UP);
    }


}
