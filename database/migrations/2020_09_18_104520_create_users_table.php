<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 100)->nullable();
            $table->string('password', 250)->nullable();
            $table->string('full_name', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('sexs')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('address', 200)->nullable();
            $table->string('remember_token', 250)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('url_image', 255)->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
