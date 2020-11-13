<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ComicworkController;
use App\Http\Controllers\Admin\CountryController;

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

Route::get('/', 'LoginController@login')->name('login');
Route::post('/', 'LoginController@postLogin')->name('postLogin');

//Route::get('/updateComicworkAvatar', function (){
//    return view('comicworkAvatar');
//});
//
//Route::post('/updateComicworkAvatar', function (\Illuminate\Http\Request $request){
//   $newAvatar = $request->file('profile');
//    \App\MyStorage\FileModel::changeComicworkProfile(1, $newAvatar);
//});

//admin

/**
 * Trang mac dinh khi truy cap bang tai khoan admin
 */
Route::get('/', function () {
    return view('admin.index');
})->name('admin.index');

//    Route::get('comicworks', function (){
//        return view('admin.comicworks.list');
//    });

//    Route::prefix('comicworks')->group(function (){
//        Route::get('/', [
//            'as' => 'admin.comicworks.list',
//            'uses' => 'ComicworkController@list'
//        ]);
//    });


//    Route::group(['prefix' => 'roles'], function (){
//
////        Route::get('/', function (){
////            $data = \App\Models\Role::all()->toArray();
////            return view('admin.roles.list', $data);
////        });
//
//        Route::get('/', [
//            'as' => 'roles.list',
//            'uses' => 'RoleController@list'
//        ]);
//
//        Route::get('add', function (){
//           $data = new App\Models\Role();
//           $data->name = 'User';
//           $data->display_name = 'display user';
//           $data->save();
//        });
//
//        Route::get('select', function (){
//           $data = \App\Models\Role::find(1)->users->toJson();
//           echo $data;
//        });
//    });
Route::prefix('dashboards')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboards');

    Route::get('index', [DashboardController::class, 'index'])->name('admin.dashboards.index');

});
Route::prefix('comicworks')->group(function () {
    Route::get('/', [ComicworkController::class, 'index'])->name('admin.comicworks');

    Route::get('index', [ComicworkController::class, 'index'])->name('admin.comicworks.index');

    Route::get('create', [ComicworkController::class, 'create'])->name('admin.comicworks.create');

    Route::post('store', [ComicworkController::class, 'store'])->name('admin.comicworks.store');

    Route::get('edit/{id}', [ComicworkController::class, 'edit'])->name('admin.comicworks.edit');

    Route::post('update/{id}', [ComicworkController::class, 'update'])->name('admin.comicworks.update');

    Route::get('show/{id}', [ComicworkController::class, 'show'])->name('admin.comicworks.show');

    Route::get('destroy/{id}', [ComicworkController::class, 'destroy'])->name('admin.comicworks.destroy');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users');

    Route::get('index', [UserController::class, 'index'])->name('admin.users.index');

    Route::get('create', [UserController::class, 'create'])->name('admin.users.create');

    Route::post('store', [UserController::class, 'store'])->name('admin.users.store');

    Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');

    Route::post('update/{id}', [UserController::class, 'update'])->name('admin.users.update');

    Route::get('show/{id}', [UserController::class, 'show'])->name('admin.users.show');

    Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::prefix('countries')->group(function () {
    Route::get('/', [CountryController::class, 'index'])->name('admin.countries');

    Route::get('index', [CountryController::class, 'index'])->name('admin.countries.index');

    Route::get('create', [CountryController::class, 'create'])->name('admin.countries.create');

    Route::post('store', [CountryController::class, 'store'])->name('admin.countries.store');

    Route::get('edit/{id}', [CountryController::class, 'edit'])->name('admin.countries.edit');

    Route::post('update/{id}', [CountryController::class, 'update'])->name('admin.countries.update');

    Route::get('show/{id}', [CountryController::class, 'show'])->name('admin.countries.show');

    Route::get('destroy/{id}', [CountryController::class, 'destroy'])->name('admin.countries.destroy');
});

Route::prefix('roles')->group(function () {

    Route::get('/', [RoleController::class, 'index'])->name('admin.roles');

    Route::get('index', [RoleController::class, 'index'])->name('admin.roles.index');

    Route::get('create', [RoleController::class, 'create'])->name('admin.roles.create');

    Route::post('store', [RoleController::class, 'store'])->name('admin.roles.store');

    Route::get('edit/{id}', [RoleController::class, 'edit'])->name('admin.roles.edit');

    Route::post('update/{id}', [RoleController::class, 'update'])->name('admin.roles.update');

    Route::get('show/{id}', [RoleController::class, 'show'])->name('admin.roles.show');

    Route::get('destroy/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

});


//    Route::group(['prefix' => 'users'], function (){
//        Route::get('/', function (){
//            return view('admin.users.list');
//        });
//        Route::get('add', function (){
//            $data = new \App\Models\User();
//            $data->user_name = 'thanhdt164';
//            $data->password = bcrypt('123456');
//            $data->profile = 'url_profile';
//            $data->full_name = 'daotrungthanh';
//            $data->email = 'trungthanh@gmail.com';
//            $data->sex = true;
//            $data->date_of_birth = '2020-09-15';
//            $data->address = 'VinhPhuc';
//            $data->status = true;
//            $data->save();
//        });
//    });
