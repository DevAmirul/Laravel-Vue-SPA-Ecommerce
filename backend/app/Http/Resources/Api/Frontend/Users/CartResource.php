<?php

namespace App\Http\Resources\Api\Frontend\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'item_id'=> $this->item_id,
            'name'=> $this->name,
            'image'=> asset(Storage::url('products/' . $this->image)),
            'sale_price'=> $this->sale_price,
            'discount'=> $this->discount,
            'qty'=> $this->qty,
            'type'=> $this->type,
            'qty'=> $this->qty,
            'item_id'=> $this->item_id,
            'p_id'=> $this->p_id,
            'status'=> $this->status,
            'expire_date'=> $this->expire_date,
        ];
    }
}
