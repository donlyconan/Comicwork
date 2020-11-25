<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->foreign('id_comicwork', 'fk_votes_comicworks')->references('id')->on('comicworks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_user', 'fk_votes_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('fk_votes_comicworks');
            $table->dropForeign('fk_votes_users');
        });
    }
}
