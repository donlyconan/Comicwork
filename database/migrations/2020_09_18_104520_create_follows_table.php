<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->integer('id_user');
            $table->integer('id_comicwork')->index('fk_follows_comicworks');
            $table->integer('status')->nullable()->default(1);
            $table->timestamp('follow_date')->useCurrent();
            $table->primary(['id_user', 'id_comicwork']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
