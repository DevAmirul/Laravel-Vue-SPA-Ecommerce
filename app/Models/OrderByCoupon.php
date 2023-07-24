<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderByCoupon extends Model
{
    use HasFactory;

    public function coupon(): BelongsTo {
        return $this->belongsTo(Coupon::class);
    }
}
