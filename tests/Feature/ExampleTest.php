<?php

namespace Tests\Feature;

use App\Model\Vote;
use App\MyStorage\FileSystem;
use Tests\TestCase;


class ExampleTest extends TestCase
{


    /**
     *
     */
    public function database(){
        //Sắp xếp theo danh mục yêu thích cập nhật theo tuần
        $from = date("m-d-y", 0);
        $to = date('m-d-y', time());

        $favourite = Vote::selectRaw("id_comicwork, count(id_user) as totalVote")
            ->whereBetween('created_at', [$from, $to])
            ->groupBy("id_comicwork")->get();
    }
    /**
     * A basic test example.
     * @return void
     */
    public function testBasicTest()
    {

        $file = FileSystem::getFolderUser();
        var_dump($file->getPath());
        var_dump($file->listFiles(function ($f){
            return true;
        }));
        var_dump($file->parent());
    }
}
