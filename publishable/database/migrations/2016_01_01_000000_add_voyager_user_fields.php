<?php

use Illuminate\Database\Migrations\Migration;

class AddVoyagerUserFields extends Migration
{
    /**
     * @return string
     */
    protected function getUsersTableName()
    {
        $userModel = config('voyager.user.namespace');
        return (new $userModel())->getTable();
    }

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
