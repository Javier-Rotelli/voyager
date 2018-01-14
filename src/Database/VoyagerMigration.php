<?php

namespace TCG\Voyager\Database;

use Illuminate\Database\Migrations\Migration;

class VoyagerMigration
{
    /**
     * @return string
     */
    protected function getUsersTableName()
    {
        $userModel = config('voyager.user.namespace');
        return (new $userModel())->getTable();
    }
}