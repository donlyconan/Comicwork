<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->integer('id_comicwork')->index('id_comicwork');
            $table->integer('id_user');
            $table->integer('status')->nullable()->default(1);
            $table->time('created_at')->default('CURRENT_TIMESTAMP()');
            $table->timestamp('updated_at')->useCurrent();
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
        Schema::dropIfExists('votes');
    }
}
