<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MessageResource;
class ChatResource extends JsonResource
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
            'user_id' => $this->user_id,
            'chat_name' => $this->name,
            'code' => $this->code,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'last_five_message' =>MessageResource::collection($this->whenLoaded('messages')),
        ];
    }
}
