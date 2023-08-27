<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DiscountPrice extends Model {
    use HasFactory;

    public $timestamps = false;

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function offer(): HasOne {
        return $this->hasOne(Offer::class);
    }
}
