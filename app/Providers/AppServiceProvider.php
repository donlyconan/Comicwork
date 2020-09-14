<?php

namespace App\Providers;

use App\Model\Country;
use App\Model\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\Array_;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{

    const Sory_by_category = array(
        ""
    );

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
        Schema::defaultStringLength(191);
        if (Auth::check()) {
            View::share("user", Auth::user());
        }


        View::share("categories", $this->load_category());
        View::share("countries", $this->load_country());
    }


    function load_category()
    {
        $root_table = Tag::all();
        return $this->toMatrix($root_table, 6);
    }

    function load_country()
    {
        $root_table = Country::all();
        return $this->toMatrix($root_table, 2);
    }


    public function toMatrix($arr, $row)
    {
        $matrix = array();
        $part = array();
        $size = count($arr);

        foreach ($arr as $i => $value) {
            array_push($part, $value);

            if ($i != 0 && ($i + 1) % $row == 0 || $i == $size - 1) {
                array_push($matrix, $part);
                $part = array();
            }
        }
        return $matrix;
    }
}
