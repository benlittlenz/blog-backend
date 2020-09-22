<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content_preview' => Str::limit(strip_tags($this->content), 200, '...'),
            'content' => $this->content,
            'created_at' => $this->created_at->format('d/m/Y'),
        ];
    }
}
