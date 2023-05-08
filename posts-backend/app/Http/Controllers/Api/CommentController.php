<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GeneralJsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentsResource;
use App\Models\Comments;
use App\Repositories\CommentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comments::all();
        
        return  CommentsResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, CommentRepository  $commentRepository)
    {
        $payload = $request->validated();

        $payload = $request->only([
            'post_id',
            'comment',
        ]);
        
        $created = $commentRepository->create($payload);

        return new CommentsResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        
        return new CommentsResource($comments);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request,Comments $comments, CommentRepository  $commentRepository)
    {
        $comment = $commentRepository->update($comments, $request->only([
            'comment',
            'post_id'
        ]));

        return new CommentsResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments, CommentRepository  $commentRepository)
    {
        $commentRepository->forceDelete($comments);

        return new JsonResponse([
            'data' => 'success'
        ]);
    }
}
