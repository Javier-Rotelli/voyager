<?php

use \TCG\Voyager\Database\VoyagerMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRoleRelationship extends VoyagerMigration
{
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
