<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'post_id' => $this->post_id,
            'updated_at' => $this->updated_at->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d')
        ];
    }
}