<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('id_comicwork', 'fk_histories_comicworks')->references('id')->on('comicworks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_user', 'fk_histories_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign('fk_histories_comicworks');
            $table->dropForeign('fk_histories_users');
        });
    }
}
