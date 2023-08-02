<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductAttribute extends Model {
    use HasFactory;

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function attribute(): HasMany {
        return $this->hasMany(Attribute::class);
    }
}
