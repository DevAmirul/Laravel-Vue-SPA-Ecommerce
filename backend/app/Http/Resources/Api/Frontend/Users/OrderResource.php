<?php

namespace App\Http\Resources\Api\Frontend\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'userId' => $this->user_id,
            'placeOn' => $this->created_at,
            'quantity' => $this->order_item_count,
            'total' => $this->total,
            'orderStatus' => $this->order_status,
            'paymentStatus' => $this->payment_status
        ];
    }
}
