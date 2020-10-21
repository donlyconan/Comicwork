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
 * Bo dinh tuyen danh content co the chinh sua theo kich ban dua ra
 * danh cho phan content
 */
Route::middleware('autologin')->get('/', 'HomeController@index')
    ->name('homepage');

Route::group(['prefix' => 'home'], function () {
    //Tìm kiếm theo thể loại
    Route::get('/category', 'HomeController@category')->name("home.category");

    //Tìm kiếm theo đất nước
    Route::get('/country', 'HomeController@country')->name("home.country");

    //Tìm kiếm theo danh mục
    Route::get('/sort/{mode}', 'HomeController@sort')->name("home.sort");

    //tim kiem noi dung
    Route::get('/browser', 'SearchController@browser')->name('home.browser');

    //tìm kiếm nội dung
    Route::get('/search', 'SearchController@search')->name('home.search');

    //Tải danh sách truyện tranh dành cho namx
    Route::get('/for/{sexs}', 'SearchController@forBoy')->name('home.man');
});


/**
 * Nhóm định tuyến danh cho user thuc hien cac chuc nang thay doi cap nhat
 * nang cap, chinh sua thong tin cua user
 */
Route::prefix("user")->group(function () {

    //Xem thong tin user
    Route::get('/', 'UserController@index')->name("user.info");

    //cai dat route duong danh den lich su
    Route::get('/history', 'UserController@history')->name("user.history");

    //cai dat route duong danh den theo doi truyen
    Route::get('/follow', 'UserController@follow')->name("user.follow");

    //dang xuat khoi danh sach
    Route::get('/logout', 'UserController@logout')->name("user.logout");

    Route::get("/account", 'PasswordController@index')->name("user.account");

    //Thay đổi mật khẩu người dùng
    Route::post("/change-password", 'PasswordController@change')->name("user.change-password");

    //chinh sua thong tin user
    Route::post("edit", 'UserController@edit')->name("user.edit");
});


//cau hinh nhom truyen tranh voi tien to la tac pham
Route::prefix("/comic")->group(function () {

    //tải tranh truyện tranh
    Route::get('/{id}', 'ComicworkController@index')->name("comic.info");

    //tải chapter bộ truyện
    Route::get('/{id}/{chapter}', 'ComicworkController@chapter')->name("comic.chapter");
});


//Xác thực google
Route::prefix('/auth')->group(function () {

    //Chuyển hướng tới xác thực người dùng google
    Route::get('/{provider}', 'SocialAuthController@redirect')->name('social.auth');

    //Gọi lại sau khi người dùng đã xác thực
    Route::get('/{provider}/callback', 'SocialAuthController@callback')->name('social.callback');
});


//Tai trang dang nhap
Route::get('login', 'LoginController@index')->name("login");

//Dang nhap vao may chu
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login'])->name('user-login');

//trang dang ky tai khoan
Route::get('register', 'RegisterController@index')->name("register");

//dang ky tai khoan
Route::post("/signup/new-account", 'RegisterController@register')->name("signup.new-account");

//Kich hoat nguoi dung
Route::get('/activation/{token}', 'UserActivationController@active')->name('user.activation');

//Chức năng đổi cấp lại mật khẩu người dùng
Route::prefix("/forgot")->group(function () {

    Route::get('/', 'ForgotController@index')->name('user.forgot');

    //Giu email xac thuc
    Route::post('/send-email', 'ForgotController@sendEmail')->name('user.send-email');

    //Tien hanh xac thuc
    Route::get('/authenticate/{token}', 'ForgotController@authenticate')->name('user.authenticate');

    //Hoan tat thiet lap mat khau
    Route::post('/reset-password', 'PasswordController@reset')->name('user.reset-password');
});




