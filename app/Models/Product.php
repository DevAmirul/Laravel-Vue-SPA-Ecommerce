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

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }

    public function productAttribute(): HasMany {
        return $this->hasMany(ProductAttribute::class);
    }

    public function productPurchasedRevenue(): HasOne {
        return $this->hasOne(ProductPurchasedRevenue::class);
    }

    public function productView(): HasOne {
        return $this->hasOne(ProductView::class);
    }

    public function review(): HasMany {
        return $this->hasMany(Review::class);
    }

}
