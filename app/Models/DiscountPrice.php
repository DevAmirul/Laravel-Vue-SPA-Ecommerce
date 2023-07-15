<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscountPrice extends Model {
    use HasFactory;

    public function discountType(): BelongsTo {
        return $this->belongsTo(DiscountType::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
