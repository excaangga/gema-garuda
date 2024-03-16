<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id_user' => $this->id_user,
            'user_name' => $this->user->name,
            'user_nickname' => $this->user->nickname,
            'user_category' => $this->user->category->category_name,
            'content_text' => $this->content_text,
            'content_image_link' => $this->content_image_link,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
