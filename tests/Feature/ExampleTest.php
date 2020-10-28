<?php

namespace Tests\Feature;

use App\Model\Chapter;
use App\Model\Comicwork;
use Carbon\Carbon;
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

    public function testBasicTest()
    {
        Comicwork::all()->each(function ($comic){
            $comic->url_image = "public/{$comic->url_image}";
            $comic->save();
        });
    }
}
