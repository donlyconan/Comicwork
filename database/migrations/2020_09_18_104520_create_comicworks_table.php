<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comicworks', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->integer('id_country')->index('fk_comicworks_countries');
            $table->string('author', 100)->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->string('publishing_company', 200)->nullable();
            $table->timestamp('publishing_year')->useCurrent();
            $table->string('url_image', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comicworks');
    }
}
