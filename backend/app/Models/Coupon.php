<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'discount',
        'type',
        'status',
        'start_date',
        'expire_date',
    ];

    public function orderByCoupon(): HasMany {
        return $this->hasMany(Order::class);
    }
}
