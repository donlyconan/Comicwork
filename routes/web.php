<?php

use Illuminate\Support\Facades\Route;

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
 * Nhom danh cho admin co the chinh sua theo kich ban dua ra
 * danh cho phan admin
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin/index');
    });
});


/**
 * Bo dinh tuyen danh main co the chinh sua theo kich ban dua ra
 * danh cho phan main
 */
Route::group(['prefix' => 'main'], function () {

    Route::get('/', function () {
        return view('main.ganeric');
    });

    Route::get('category', ['as' => 'category', function () {
        return view('main/category');
    }]);

    Route::get('sort', ['as' => 'category', function () {
        return view('main/ganeric');
    }]);

    //tim kiem noi dung
    Route::get('search', [
        'as' => 'search',
        'uses' => 'ComicworkController@search'
    ]);
});


/**
 * Nhóm định tuyến danh cho user thuc hien cac chuc nang thay doi cap nhat
 * nang cap, chinh sua thong tin cua user
 */
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [
        'as' => 'userinfo', 'uses' => 'Home\\UserController@index'
    ]);

    //cai dat route duong danh den lich su
    Route::get('history', 'Home\\UserController@history');

    //cai dat route duong danh den theo doi truyen
    Route::get('follow', 'Home\\UserController@follow');


});

/**
 * Bo dinh tuyen danh cho nhom truyen, tac pham truyen tranh
 */

Route::group(['prefix' => 'comicwork'], function () {
    Route::get('/{id}', [
        'as' => 'go-comicwork', 'uses' => 'ComicworkController@index'
    ]);
});


/**
 * Bo dinh tuyen danh cho chuc nang co ban cua trang web
 */
//Tai trang dang nhap
Route::get('login', ['as' => 'view-login'
    , function () {
        return view('home.user.login');
    }
]);

//Dang nhap vao may chu
Route::post('login', ['as' => 'login', 'uses' => 'Home\\LoginController@login']);


//trang dang ky tai khoan
Route::get('signup', ['as' => 'signup',
    function () {
        return view('home.user.signup');
    }
]);

Route::get('comicwork', 'ComicworkController@index');

//mac dinh trang web se di den trang tru
Route::get('/', [
    "as" => "index",
    "uses" => function () {
        return view('home.main.index');
    }
]);


Route::get('query', function () {
    return view('home.category.search');
});


//kiem tra ket noi
Route::get('tester', function () {
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
//        \App\Model\Chapter::find(1)->comicwork,
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





//Route::get('/main', [
//    "as" => "homeindex",
//    "uses" => "HomeController@index"
//]);
//
//Route::get('index/{id}', ['as' => 'index2s', function ($id) {
//    echo "Result: $id";
//}])->where(['id' => "[0-9]+"]);
//
//Route::get('index/{ngay}', ['as' => 'index3s', function ($ngay) {
//    echo 'Result: ' . $ngay;
//}])->where(['ngay' => '\w+']);
//
//
//Route::group(['prefix' => 'admin'], function () {
//
//    Route::get('sua/{id}', function ($id) {
//        echo 'Sua: ' . $id;
//    });
//
//    Route::get('xoa/{id}', function ($id) {
//        echo 'Xoa: ' . $id;
//    });
//});
//
//
//Route::get("myname/{name}", "HomeController@getName");
//
//
//Route::post("post/{id}", function ($id) {
//    return 'post: ' . $id;
//});
//
//Route::get('upload', function () {
//    return view("post");
//});
//
//Route::post("index/postFile", ['as' => 'postFile',
//        'uses' => 'HomeController@postFile']
//);
//
//Route::get('hello/{name}', 'HomeController@getView');
