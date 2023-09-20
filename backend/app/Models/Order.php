<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'discount',
        'subtotal',
        'total',
        'shipping_method_id',
        'coupon_id',
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:d-m-Y',
    // ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function userPayment(): HasOne
    {
        return $this->hasOne(UserPayment::class);
    }

    public function shippingMethod(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class);
    }
}
