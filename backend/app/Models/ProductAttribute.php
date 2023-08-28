<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductAttribute extends Model {
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_attribute_values',
        'size_attribute_values',
    ];

    public $timestamps = false;

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
