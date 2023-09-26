<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function attributeOption(): HasMany {
        return $this->HasMany(AttributeOption::class);
    }

    public function productAttribute(): HasMany {
        return $this->hasMany(ProductAttribute::class);
    }
}
