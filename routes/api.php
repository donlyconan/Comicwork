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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/v1/comment')->group(function () {

    //lay comment cho 1 bo truyen tranh
    Route::get('/load', 'CommentController@load')->name('comment.load');

    //Giử comment lên từ client
    Route::post('/post', 'CommentController@post')->name('comment.post');
});


Route::prefix('/v1/vote')->group(function () {

    //Nhan ve luot like cua 1 bo truyen
    Route::get('/product/{id}', 'VoteController@load')->name('vote.load');


    //like mot bo truyen
    Route::post('/product/like', 'VoteController@like')->name('vote.like');


});


Route::prefix('/v1/follow')->group(function () {

    //Theo doi mot bo truyen
    Route::get('/{id}', 'FollowController@follow')->name('follow.follow');


    //bo theo doi mot bo truyen
    Route::post('/unfollow', 'FollowController@unfollow')->name('follow.unfollow');
});
