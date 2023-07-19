<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'created_by',
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function offer(): BelongsTo {
        return $this->belongsTo(Offer::class);
    }

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

}
