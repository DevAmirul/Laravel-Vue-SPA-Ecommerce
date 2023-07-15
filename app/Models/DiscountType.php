<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiscountType extends Model {
    use HasFactory;

    public function discountPrice(): HasMany {
        return $this->hasMany(DiscountPrice::class);
    }

    public function coupon(): HasMany {
        return $this->hasMany(Coupon::class);
    }

    public function offer(): HasMany {
        return $this->hasMany(Offer::class);
    }
}
