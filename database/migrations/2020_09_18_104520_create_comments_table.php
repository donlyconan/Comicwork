<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_parent')->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('id_reply')->nullable();
            $table->integer('id_chapter')->nullable();
            $table->integer('id_comicwork')->nullable();
            $table->text('content')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
