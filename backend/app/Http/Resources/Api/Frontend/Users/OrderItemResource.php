<?php

namespace App\Http\Resources\Api\Frontend\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class OrderItemResource extends JsonResource
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
                'order_status' => $this->order_status,
                'payment_status' => $this->payment_status,
                'discount' => $this->discount,
                'subtotal' => $this->subtotal,
                'total' => $this->total,
                'created_at' => $this->created_at,
                'c_discount' => $this->c_discount,
                'user_name' => $this->user_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'city' => $this->city,
                'state' => $this->state,
                'zip_code' => $this->zip_code,
                'address' => $this->address,
                'qty' => $this->qty,
                'discount_price' => $this->discount_price,
                'p_id' => $this->p_id,
                'name' => $this->name,
                'image' => asset(Storage::url('products/' . $this->image)),
                'sale_price' => $this->sale_price,
                'original_price' => $this->original_price,
        ];
    }
}
