<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tab = \App\Model\Comicwork::cursor()->filter(function ($item){
            return $item->chapters()->count() == 0;
        });


    }
}
