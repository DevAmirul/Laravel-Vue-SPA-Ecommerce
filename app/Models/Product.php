<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model {
    use HasFactory;

    public function subCategory(): BelongsTo {
        return $this->belongsTo(subCategory::class);
    }

    public function editor(): BelongsTo {
        return $this->belongsTo(Editor::class);
    }


}
