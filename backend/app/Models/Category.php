<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'section_id',
        'image',
    ];

    public function section(): BelongsTo {
        return $this->belongsTo(Section::class);
    }

    public function offer(): BelongsTo {
        return $this->belongsTo(Offer::class);
    }

    public function subCategory(): HasMany {
        return $this->hasMany(SubCategory::class);
    }

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }
}
