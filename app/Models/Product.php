<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'sku',
        'description',
        'short_description',
        'information',
        'price',
        'discount_price',
        'stock_status',
        'qty_in_stock',
        'sub_category_id',
        'image',
        'all_images',
    ];

    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class);
    }

    public function editor(): BelongsTo {
        return $this->belongsTo(Editor::class);
    }

    public function revenueFromProduct(): HasOne {
        return $this->hasOne(RevenueFromProduct::class);
    }

}
