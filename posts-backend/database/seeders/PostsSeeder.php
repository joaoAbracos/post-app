<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisabledForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    use TruncateTable,DisabledForeignKeys; 
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disabledKeys();
        $this->truncate('posts');
        DB::table('posts')->truncate();

        Post::factory(3)
            ->has(Comments::factory(3), 'comments')
            ->create();

        $this->enableKeys();
    }
}
