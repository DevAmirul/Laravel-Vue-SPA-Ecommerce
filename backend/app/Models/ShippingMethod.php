<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingMethod extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'cost',
    ];

    public function order(): HasMany {
        return $this->hasMany(Order::class);
    }
}
