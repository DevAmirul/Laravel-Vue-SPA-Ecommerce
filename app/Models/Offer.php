<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'discount',
        'type',
        'status',
        'start_date',
        'expire_date',
    ];

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
