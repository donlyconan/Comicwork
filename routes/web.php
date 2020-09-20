<?php

use App\Model\Comicwork;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Bo dinh tuyen danh content co the chinh sua theo kich ban dua ra
 * danh cho phan content
 */
Route::get('/', 'HomeController@index')->name('home.index');


Route::group(['prefix' => 'home'], function () {
    //trả về trang giao diện chính
    Route::get('/', 'HomeController@index')->name('homepage');

    //Tìm kiếm theo thể loại
    Route::get('/category', 'HomeController@category')->name("home.category");

    //Tìm kiếm theo đất nước
    Route::get('/country', 'HomeController@country')->name("home.country");

    //Tìm kiếm theo danh mục
    Route::get('/sort', 'HomeController@sort')->name("home.sort");

    //tim kiem noi dung
    Route::get('/browser', 'HomeController@browser')->name('home.browser');

    //tìm kiếm nội dung
    Route::get('/search', 'SearchController@search')->name('home.search');
});


/**
 * Nhóm định tuyến danh cho user thuc hien cac chuc nang thay doi cap nhat
 * nang cap, chinh sua thong tin cua user
 */
Route::prefix("user")->group(function () {

    //Xem thong tin user
    Route::get('/', 'UserController@index')->name("user.info");

    //cai dat route duong danh den lich su
    Route::get('history', 'UserController@history')->name("user.history");

    //cai dat route duong danh den theo doi truyen
    Route::get('follow', 'UserController@follow')->name("user.follow");

    //dang xuat khoi danh sach
    Route::get('logout', 'UserController@logout')->name("user.logout");

    //thay doi mat khau cho user
    Route::match(["get", "post"], "change-password", 'UserController@changePassword')->name("change-password");

    //chinh sua thong tin user
    Route::post("edit", 'UserController@edit')->name("user.edit");
});

//cau hinh nhom truyen tranh voi tien to la tac pham
Route::prefix("/comicwork")->group(function () {
    //di toi xem trang truyen
    Route::get('/{id}', 'ComicworkController@index')->name("comicwork.info");

    //tải tranh truyện tranh
    Route::get('/{id}/chapter={chapter}', 'ComicworkController@chapter')->name("comiwork.chapter");
});


//Tai trang dang nhap
Route::get('login', 'LoginController@index')->name("login");

//giu email yeu cap cap lai mat khau
Route::post("send-email", "MailController@send")->name("email.send");

//Dang nhap vao may chu
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login']);

//trang dang ky tai khoan
Route::get('register', 'RegisterController@index')->name("register");

//dang ky tai khoan
Route::post("/signup/new-account", 'RegisterController@register')->name("signup.new-account");

//Trang hien thi lay lai mat khau-doi mat khau
Route::get("forgot", 'ForgotController@forgot')->name('user.forgot');


//thu nghiem
Route::get("/query", function () {
    $comics =  Comicwork::find(1);

    dd($comics->countViews());
});


//kiem tra ket noi
Route::get('/query', function () {

    echo $pathname = '/user/avatar.png';
    foreach (\App\Model\User::cursor() as $user) {
        $user->url_image = $pathname;
        $user->save();
    }

    echo 'rest: '.  Storage::exists($pathname);
//    $tester = [
//        \App\Model\Chapter::all(),
//        \App\Model\Comicwork::all(),
//        \App\Model\Follow::all(),
//        \App\Model\History::all(),
//        \App\Model\Image::all(),
//        \App\Model\Notification::all(),
//        \App\Model\Role::all(),
//        \App\Model\RoleUser::all(),
//        \App\Model\Tag::all(),
//        \App\Model\ComicworkTag::all(),
//        \App\Model\User::all(),
//        \App\Model\View::all(),
//        \App\Model\Vote::all()
//    ];

//    $user = [
//        \App\Model\User::find(1)->follows,
//        \App\Model\User::find(1)->votes,
//        \App\Model\User::find(1)->histories,
//        \App\Model\User::find(1)->notifications,
//        \App\Model\User::find(1)->votes,
//        \App\Model\User::find(1)->roles
//    ];

//    $chapter = [
//        \App\Model\Chapter::find(1)->product,
//        \App\Model\Chapter::find(1)->images,
//        \App\Model\Chapter::find(1)->views
//    ];

//    $commicwork = [
//        \App\Model\Comicwork::all(),
//        \App\Model\Comicwork::find(1)->follows,
//        \App\Model\Comicwork::find(1)->histories,
//        \App\Model\Comicwork::find(1)->votes,
//        \App\Model\Comicwork::find(1)->views,
//        \App\Model\Comicwork::find(1)->chapters,
//        \App\Model\Comicwork::find(1)->users,
//        \App\Model\Comicwork::find(1)->tags    //[error]
//    ];
//
//    $tags = [
//        \App\Model\Tag::all(),
//        \App\Model\Tag::find(1)->comicworkTag,
//        \App\Model\Tag::find(1)->comicworks
//    ];

//    dd($commicwork);
});



