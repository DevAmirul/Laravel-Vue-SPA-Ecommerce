<?php

namespace App\Http\Resources\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'image' => $this->when($this->image, asset(Storage::url('offers/' . $this->image))),
            'title' => $this->whenHas('title'),
            'type' => $this->type,
            'discount' => $this->discount,
            'status' => $this->status,
            'expire_date' => $this->expire_date,
        ];
    }
}
