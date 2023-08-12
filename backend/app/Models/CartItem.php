<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
    ];

    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
