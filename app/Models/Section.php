<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'created_by',
    ];

    public function editors(): BelongsTo {
        return $this->belongsTo(Editor::class);
    }

    public function Categories(): HasMany {
        return $this->hasMany(Category::class);
    }
}
