<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('views', function (Blueprint $table) {
            $table->foreign('id_chapter', 'fk_views_chapers')->references('id')->on('chapters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_comicwork', 'fk_views_comicworks')->references('id')->on('comicworks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_user', 'fk_views_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('views', function (Blueprint $table) {
            $table->dropForeign('fk_views_chapers');
            $table->dropForeign('fk_views_comicworks');
            $table->dropForeign('fk_views_users');
        });
    }
}
