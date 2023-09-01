<?php

namespace App\Http\Resources\Api\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductShowResources extends JsonResource
{
    public $collects = Product::class;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image'=> asset(Storage::url('products/' . $this->image)),
            'description'=>$this->description,
            'sale_price'=>$this->sale_price,
            'slug'=>$this->slug,
            'review_avg_rating_value'=>$this->review_avg_rating_value,
            'review_count'=>$this->review_count,
            'offer'=>OfferResource::make($this->offer),
        ];
    }
}
