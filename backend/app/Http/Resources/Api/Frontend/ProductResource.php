<?php

namespace App\Http\Resources\Api\Frontend;

use App\Http\Resources\Api\Frontend\Users\DiscountPriceResources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = 'user';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $this->image,
            'salePrice' => $this->sale_price,
            'specification' => $this->specification,
            // 'reviewCount'=>$this->review_count,
            // 'reviewAvg'=>$this->review_avg_rating_value,
            // 'discountPrice' => new DiscountPriceResources($this->discountPrice),

        ];
    }
}
