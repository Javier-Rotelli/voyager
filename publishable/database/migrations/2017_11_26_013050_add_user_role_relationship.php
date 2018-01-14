<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \TCG\Voyager\Database\VoyagerConfig;

class AddUserRoleRelationship extends Migration
{
    use VoyagerConfig;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::getUsersTableName(), function (Blueprint $table) {
            $table->unsignedInteger('role_id')->change();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::getUsersTableName(), function (Blueprint $table) {
            $table->integer('role_id')->change();
            $table->dropForeign(['role_id']);
        });
    }
}
