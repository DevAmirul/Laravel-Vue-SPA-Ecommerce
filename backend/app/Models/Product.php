<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'sale_price',
        'original_price',
        'qty_in_stock',
        'stock_status',
        'status',
        'section_id',
        'category_id',
        'sub_category_id',
        'brand_id',
        'tags',
        'description',
        'specification',
        'image',
        'gallery',
    ];

    protected $casts = [
        // 'review_avg_rating_value' => 'integer',
        'sale_price' => 'integer',
        'original_price' => 'integer',
    ];

    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }

    public function offer(): BelongsTo {
        return $this->belongsTo(Offer::class);
    }

    public function productAttribute(): HasMany {
        return $this->hasMany(ProductAttribute::class);
    }

    public function revenueFromPurchaseAndSaleOfProduct(): HasOne {
        return $this->hasOne(RevenueFromPurchaseAndSaleOfProduct::class);
    }

    public function productView(): HasOne {
        return $this->hasOne(ProductView::class);
    }

    public function discountPrice(): HasOne {
        return $this->hasOne(DiscountPrice::class);
    }

    public function review(): HasMany {
        return $this->hasMany(Review::class);
    }

    public function cartItem(): HasMany {
        return $this->hasMany(CartItem::class);
    }

}
