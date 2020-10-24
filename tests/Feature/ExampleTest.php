<?php

namespace Tests\Feature;

use App\Mail\UserForgot;
use App\Model\User;
use App\Model\UserActivation;
use App\Model\Vote;
use App\MyStorage\FileSystem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;


class ExampleTest extends TestCase
{


    /**
     * A basic test example.
     * @return void
     */
    public function database()
    {

//       /Sắp xếp theo danh mục yêu thích cập nhật theo tuần
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

    public function login2($username, $password)
    {
        $result = \DB::table('users')
            ->where('username', $username)
            ->where('password', $password)->get();
        return count($result) != 0 ? "Success" : "Failed";
    }


    public function login($username, $password)
    {
        $username = preg_replace('/[^\w\d]/', '', $username);
        $password = preg_replace('/[^\w\d]/', '', $password);
        $result = \DB::select("select * from users where username='$username' and password='$password'");
        return count($result) != 0 ? "Success" : "Failed";
    }



    public function testBasicTest()
    {

    }
}
