<?php

use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Database\VoyagerConfig;

class AddVoyagerUserFields extends Migration
{
    use VoyagerConfig;
    /**
     * Run the migrations.
     */
    public function up()
    {
        $userTableName = $this->getUsersTableName();
        Schema::table($userTableName, function ($table) use ($userTableName) {
            if (!Schema::hasColumn($userTableName, 'avatar')) {
                $table->string('avatar')->nullable()->after('email')->default('users/default.png');
            }
            $table->integer('role_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $userTableName = $this->getUsersTableName();
        if (Schema::hasColumn($userTableName, 'avatar')) {
            Schema::table($userTableName, function ($table) {
                $table->dropColumn('avatar');
            });
        }
        if (Schema::hasColumn($userTableName, 'role_id')) {
            Schema::table($userTableName, function ($table) {
                $table->dropColumn('role_id');
            });
        }
    }
}
