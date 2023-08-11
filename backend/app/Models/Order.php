<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'discount',
        'subtotal',
        'total',
        'shipping_method_id',
        'coupon_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo {
        return $this->belongsTo(Coupon::class);
    }

    public function orderItem(): HasMany {
        return $this->hasMany(OrderItem::class);
    }
}
