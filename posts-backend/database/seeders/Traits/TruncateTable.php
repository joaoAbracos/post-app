<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait TruncateTable 
{
    /**
     * Run the database seeds.
     */
    protected function truncate($table)
    {
        DB::table($table)->truncate();
    }
}