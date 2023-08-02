<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'image',
    ];

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function offer(): BelongsTo {
        return $this->belongsTo(Offer::class);
    }
}
