<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /*
     * Dinh nghia them tham so cho validator
     * Username: regex
     * passowrd: regex
     * Email: regex
     * name: regex
     * id: regexs
     * */
    public function boot()
    {
        //cấu hình item cho blade
        Blade::include('include.itemview', 'itemview');
        Schema::defaultStringLength(191);

        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addDays(10));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::personalAccessTokensExpireIn(Carbon::now()->addDays(10));
    }



}
