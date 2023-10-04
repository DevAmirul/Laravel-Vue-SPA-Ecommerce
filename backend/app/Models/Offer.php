<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offer extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'image',
        'discount',
        'type',
        'status',
        'start_date',
        'expire_date',
    ];

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function category(): HasMany {
        return $this->hasMany(Category::class);
    }

    public function subCategory(): HasMany {
        return $this->hasMany(SubCategory::class);
    }

    public function brand(): HasMany {
        return $this->hasMany(Brand::class);
    }
}
