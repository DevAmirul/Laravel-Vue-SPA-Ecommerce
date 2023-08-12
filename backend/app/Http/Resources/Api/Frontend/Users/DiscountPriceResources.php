<?php

namespace App\Http\Resources\Api\Frontend\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountPriceResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'discount' => $this->discount,
            'type' => $this->type,
            'startDate' => $this->start_date,
            'expireDate' => $this->expire_date,
        ];
    }
}
