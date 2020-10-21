<?php

namespace Tests\Feature;

use App\Mail\UserForgot;
use App\Model\User;
use App\Model\UserActivation;
use App\Model\Vote;
use Carbon\Carbon;
use Tests\TestCase;


class ExampleTest extends TestCase
{


    /**
     * A basic test example.
     * @return void
     */
    public function database()
    {

//        /Sắp xếp theo danh mục yêu thích cập nhật theo tuần
        $carbon = Carbon::now();
        $to = $carbon->endOfWeek()->toDateTime();
        $from = $carbon->startOfWeek()->toDateTime();

        $fav = Vote::selectRaw("id_comicwork, count(id_user) as totalVote")
            ->whereBetween('created_at', [$from, $to])
            ->groupBy("id_comicwork")
            ->orderBy('totalVote', 'desc')->get();

        dd($fav);
    }

    public function sendEmail()
    {
        $data = new UserActivation();
        $data->user_id = 20;
        $data->createToken('User Active');

        \Mail::to('donlyconan@gmail.com')->send(new UserForgot($data));
    }

    /**
     * A basic test example.
     * @return void
     */
    public function testBasicTest()
    {
        $user = new UserActivation();
        $user->createToken('Passport');
        echo $user->id.'\n';
        echo \Crypt::decryptString($user->token());
    }
}
