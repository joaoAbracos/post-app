<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisabledForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    use TruncateTable,DisabledForeignKeys; 
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disabledKeys();
        $this->truncate('comments');
        DB::table('comments')->truncate();
         \App\Models\Comments::factory(3)->create();
        $this->enableKeys();
    }
}
