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
        'image',
        'slug',
        'created_by',
    ];

    public function category(): HasMany {
        return $this->hasMany(Category::class);
    }
}
