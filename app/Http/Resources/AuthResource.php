<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'device_uuid' => $this->device_uuid,
            'device_name' => $this->device_name,
            'subscription_status' => $this->premium ? 'premium' : 'non-premium',
            'chat_credit' => $this->chat_credit,
            // 'subscription_details' => $this->premium ? $this->subscription_details : null,
        ];
    }
}
