<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GeneralJsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $post = Post::query()->paginate($pageSize);

        return PostResource::collection($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request, PostRepository $postRepository)
    {

        $payload = $request->only([
            'title',
            'body',
            'type'
        ]);


        // $validator = Validator::make(
        //     $payload,
        //     [
        //         'title' => ['string', 'required'],
        //         'body' => ['string', 'required'],
        //         'type' => ['string', Rule::in(['Frontend', 'Backend', 'FullStack'])]
        //     ],
        //     [
        //         'title.required' => "Please eter a valid Title",
        //         'body.required' => "Please eter a valid Title",
        //         'type.in' => 'The type field must be one of: Frontend, Backend, FullStack'
        //     ]
        // );
        // try {
        //     $validator->validate();
        // } catch (\Throwable $th) {
            
        //     return new JsonResponse([
        //         'errors' => $validator->errors(),
        //     ], 422);

        // }


        $created = $postRepository->create($payload);

        return new PostResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, PostRepository $postRepository)
    {
        $post = $postRepository->update($post, $request->only([
            'title',
            'body',
            'type'
        ]));

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, PostRepository $postRepository)
    {
        $postRepository->forceDelete($post);

        return new JsonResponse([
            'data' => 'success'
        ]);
    }
}