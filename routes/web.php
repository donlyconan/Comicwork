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
 * Bo dinh tuyen danh home co the chinh sua theo kich ban dua ra
 * danh cho phan home
 */
Route::group(['prefix' => 'home'], function () {
    Route::get('category', ['as' => 'category', function () {
        return view('home/category');
    }]);

    Route::get('sort', ['as' => 'category', function () {
        return view('home/ganeric');
    }]);
});


/**
 * Nhóm định tuyến danh cho user thuc hien cac chuc nang thay doi cap nhat
 * nang cap, chinh sua thong tin cua user
 */
Route::group(['prefix' => 'user'], function () {
    Route::get('info', [
        'as' => 'userinfo', 'uses' => 'Home\\UserController@index'
    ]);
});

/**
 * Bo dinh tuyen danh cho nhom truyen, tac pham truyen tranh
 */
Route::group(['prefix' => 'comicwork'], function () {
    Route::get('/', [
        'as' => 'ck_control', function(){return view('home/comicwork');}
    ]);
});

/**
 * Bo dinh tuyen danh cho chuc nang co ban cua trang web
 */

//Tai trang dang nhap
Route::get('login', ['as' => 'view-login'
    , function () {
        return view('home/login');
    }
]);


////cai dat route duong danh den lich su
//Route::get('history', [
//    'as'=> 'myhistory', 'uses'=>'HomeController'
//]);
//

//Dang nhap vao may chu
Route::post('login', ['as' => 'login', 'uses' => 'Home\\LoginController@login']);


//trang dang ky tai khoan
Route::get('signup', ['as' => 'signup',
    function () {
        return view('home/signup');
    }
]);

//mac dinh trang web se di den trang tru
Route::get('/', [
    "as" => "homepage",
    "uses" => function () {
        return view('home/index');
    }
]);









//Route::get('/home', [
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
