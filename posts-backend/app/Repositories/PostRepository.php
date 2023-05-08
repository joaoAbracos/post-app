<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{


    public function create(array $attributes)
    {

        return DB::transaction(function () use ($attributes) {


            $created = Post::query()->create([
                'title' => data_get($attributes, 'title', 'Untitled'),
                'body' => data_get($attributes, 'body'),
                'type' => data_get($attributes, 'type')
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create. ');

            return $created;
        });
    }
    /**
     * @param Post $post
     * @param array $attributes
     * @return mixed
     */
    public function update($post, array $attributes)
    {

        return DB::transaction(function () use ($post, $attributes) {

            
            $updatedPost = $post->update([
                'title' => data_get($attributes, 'title') ?? $post->title,
                'body' => data_get($attributes, 'body') ?? $post->body,
                'type' => data_get($attributes, 'type') ?? $post->type
            ]);

            throw_if(!$updatedPost, GeneralJsonException::class, 'Failed to Update. ');

            return $post;
        });
    }
    /**
     * @param Post $post
     * @return mixed
     */
    public function forceDelete($post)
    {

        return DB::transaction(function () use ($post) {
            $deleted = $post->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Failed to delete. ');

            return $deleted;
        });
    }
}