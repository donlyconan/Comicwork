<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicworkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comicwork_tag', function (Blueprint $table) {
            $table->integer('id_comicwork');
            $table->integer('id_tag')->index('fk_comicwork_tag_tags');
            $table->timestamp('attached_date')->useCurrent();
            $table->primary(['id_comicwork', 'id_tag']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comicwork_tag');
    }
}
