<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToComicworkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comicwork_tag', function (Blueprint $table) {
            $table->foreign('id_comicwork', 'fk_comicwork_tag_comicworks')->references('id')->on('comicworks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_tag', 'fk_comicwork_tag_tags')->references('id')->on('tags')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comicwork_tag', function (Blueprint $table) {
            $table->dropForeign('fk_comicwork_tag_comicworks');
            $table->dropForeign('fk_comicwork_tag_tags');
        });
    }
}
