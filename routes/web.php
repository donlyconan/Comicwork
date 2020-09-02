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
    Route::get('/', function () {
        return view('home/wellcome');
    });
});
















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
