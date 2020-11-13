<?php

namespace Tests\Feature;

use App\Http\Controllers\Home\HomeController;
use App\Model\Chapter;
use App\Model\Comicwork;
use App\Model\ComicworkTag;
use App\Model\Tag;
use App\Model\View;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use PHPUnit\Framework\Exception;
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

}
