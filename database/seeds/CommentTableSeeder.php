<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = \Faker\Factory::create();
        \App\Model\Comment::insert(
            [
                'id_user' => 2,
                'id_comicwork' => 2,
                'id_reply' => 1,
                'content' => $facker->address
            ]
    );
    }
}
