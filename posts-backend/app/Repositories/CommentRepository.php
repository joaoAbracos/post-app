<?php

namespace App\Repositories;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CommentRepository extends BaseRepository
{

    /**
     * @param Comments $comment
     */
    public function create(array $attributes)
    {

        return DB::transaction(function () use ($attributes) {

           
            $created = Comments::query()->create([
                'comment' => data_get($attributes, 'comment'),
                'post_id' => data_get($attributes, 'post_id'),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create. ');

            return $created;
        });
    }
    /**
     * @param Comments $comment
     * @param array $attributes
     * @return mixed
     */
    public function update($comment, array $attributes)
    {

        return DB::transaction(function () use ($comment, $attributes) {


            $updatedComment = $comment->update([
                'comment' => data_get($attributes, 'comment') ?? $comment->comment,
                'post_id' => data_get($attributes, 'post_id') ?? $comment->post_id,
            ]);

            throw_if(!$updatedComment, GeneralJsonException::class, 'Failed to Update. ');

            return $comment;
        });
    }
    /**
     * @param Comments $comment
     * @return mixed
     */
    public function forceDelete($comment)
    {

        return DB::transaction(function () use ($comment) {
            $deleted = $comment->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Failed to delete. ');

            return $deleted;
        });
    }
}