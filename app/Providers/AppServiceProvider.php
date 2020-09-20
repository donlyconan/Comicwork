<?php

namespace App\Providers;

use App\Model\Comicwork;
use App\Model\Country;
use App\Model\Tag;
use App\MyStorage\FileSystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;

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
        FileSystem::makeIfNotExists();
        View::share("categories", Tag::all());
        View::share("countries", Country::all());
        View::share("publishYear", $this->getPulishYear());
    }

    //Lấy năm phát hành
    public function getPulishYear()
    {
        return Comicwork::selectRaw("Year(publishing_year) as year")
            ->distinct()
            ->get();
    }
}
