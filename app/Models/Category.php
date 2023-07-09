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
        'created_by',
    ];

    public function section(): BelongsTo {
        return $this->belongsTo(Section::class);
    }

    public function subCategory(): HasMany {
        return $this->hasMany(SubCategory::class);
    }
}
