<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Coupon extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'discount',
        'type',
        'status',
        'start_date',
        'expire_date',
    ];

    public function orderByCoupon(): HasOne {
        return $this->hasOne(OrderByCoupon::class);
    }
}
