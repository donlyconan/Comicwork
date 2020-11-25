<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToComicworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comicworks', function (Blueprint $table) {
            $table->foreign('id_country', 'fk_comicworks_countries')->references('id')->on('countries')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comicworks', function (Blueprint $table) {
            $table->dropForeign('fk_comicworks_countries');
        });
    }
}
