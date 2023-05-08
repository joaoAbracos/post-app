<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait DisabledForeignKeys 
{
    /**
     * Run the database seeds.
     */
    protected function enableKeys()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    protected function disabledKeys()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
    }
}