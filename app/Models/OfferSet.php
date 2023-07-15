<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferSet extends Model {
    use HasFactory;

    public function offer(): BelongsTo {
        return $this->belongsTo(Offer::class);
    }

    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }
}
