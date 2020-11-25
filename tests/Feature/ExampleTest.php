<?php

namespace Tests\Feature;

use App\Model\Chapter;
use App\Model\Comicwork;
use Carbon\Carbon;
use Ramsey\Collection\Collection;
use Tests\TestCase;


class ExampleTest extends TestCase
{

    public function score(Chapter $chapter, $views = 0)
    {
        $comic = $chapter->comicwork()->first();
        $vote = $comic->votes()->count();
        $time = strtotime($chapter->release_date);
        $comment = $comic->comments()->count();
        $rootTime = strtotime(Carbon::create(2020, 9, 1));

        return (4 * $vote + 3 * $comment + $views) / 10 - ($time - $rootTime) / 10800;
    }

    public function testExample()
    {
        $startDate = now()->subMonths();
        $endDate = now();
        $timeStartDate = strtotime($startDate);

        // Đánh giá điểm cho bộ truyện
        $h = function (Comicwork $comic) use ($timeStartDate, $endDate, $startDate) {
            $v = $comic->views()->whereBetween('created_at', [$startDate, $endDate])->count('id');
            $f = $comic->votes()->whereBetween('created_at', [$startDate, $endDate])->count();
            $n = $comic->chapters()->count();
            $d = time() - $timeStartDate;
            $c = 1000000;
            return ($f + $v) / $n - $d / $c;
        };

        // Xử lý dữ liệu thô
        $comics = Comicwork::select(['id', 'name'])
            ->cursor()->sort(function ($u, $v) use ($h, $startDate, $endDate) {
                return \request('category') == 'cao-nhat' ? $h($v) - $h($u) : $h($u) - $h($v);
            })->take(5);


        $data = collect();
        $data->put('columns', $comics->values());

        $values = new Collection();

        foreach ($comics as $comic) {
            $valCol = new Collection();
            $startDate = now()->subMonths();
            $del = $endDate

            for ()
        }


        dd($comics->all());
    }

}
