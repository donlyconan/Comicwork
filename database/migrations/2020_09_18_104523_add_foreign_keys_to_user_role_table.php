<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_role', function (Blueprint $table) {
            $table->foreign('id_role', 'fk_user_role_roles')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_user', 'fk_user_role_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_role', function (Blueprint $table) {
            $table->dropForeign('fk_user_role_roles');
            $table->dropForeign('fk_user_role_users');
        });
    }
}
