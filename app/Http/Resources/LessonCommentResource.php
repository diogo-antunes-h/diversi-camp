<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class LessonCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        $replies = collect(
            Arr::get($this->resource, 'replies')
        )->map(fn ($reply) => $this->RepliesToArray($reply));
        
        return [
            'id' => Arr::get($this->resource, 'id'),
            'name' => Arr::get($this->resource, 'user.name'),
            'date' => Arr::get($this->resource, 'created_at'),
            'comment' => Arr::get($this->resource, 'comment'),
            'replies' => $replies
        ];
    }

    private function RepliesToArray($reply)
    {
        return [
            'id' => Arr::get($reply, 'id'),
            'name' => Arr::get($reply, 'user.name'),
            'date' => Arr::get($reply, 'created'),
            'comment' => Arr::get($reply, 'comment'),
        ];
    }
}
