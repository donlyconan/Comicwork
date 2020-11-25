<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->prefix('/v1')->group(function () {

    Route::get('/ping', function () {
        return Response::json(['result' => 'Ok', 'time' => date('d-m-Y h:m:s', time())]);
    });

    Route::get('analysis', 'AnalysisController@analysis')->name('analysis');

    Route::prefix('/comment')->group(function () {

        //lay comment cho 1 bo truyen tranh
        Route::get('/load', 'CommentController@load')->name('comment.load')->withoutMiddleware('auth:api');

        //Giử binh luan 1 bo truyen tranh
        Route::post('/post', 'CommentController@post')->name('comment.post');

        //tra loi 1 binh luan
        Route::post('/reply', 'CommentController@reply')->name('comment.reply');

        //xoa binh luận
        Route::delete('/delete/{id}', 'CommentController@delete')->name('comment.delete');

    });


    Route::get('/suggest', 'SuggestController@index')->name('suggest')->withoutMiddleware('auth:api');


    Route::prefix('notify')->group(function () {

        //Load nội dung tin nhắn
        Route::get('/load', 'NotificationController@load')->name('notify.load');

        //Đánh dấu thông báo đã được xem
        Route::put('/seen', 'NotificationController@seen')->name('notify.seen');

    });

    Route::middleware('cache.headers:public;max_age=2628000;etag')->prefix('/image')->group(function () {

        //upload ảnh cho 1 bộ truyện
        Route::post('/upload', 'ImageController@upload')->name('image.upload');
    });


    //Xoá 1 bộ truyện khỏi lịch sử xem của người dùng
    Route::delete('/history/delete', 'HistoryController@delete')->name('history.delete');


    //Nhan ve luot like cua 1 bo truyen
    Route::match(['delete', 'post'], '/vote', 'VoteController@handle')->name('vote.handle-comic');


    //Theo doi hoac huy bo theo doi mot bo truyen
    Route::match(['delete', 'post'], '/follow', 'FollowController@handle')->name('follow.handle-comic');


    Route::post('/login', 'ApiAuthentication@login')->withoutMiddleware('auth:api');

    Route::get('/logout', 'ApiAuthentication@logout')->name('api.logout');

    Route::get('/user-info', 'ApiAuthentication@user');

});

