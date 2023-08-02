<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeOption extends Model {
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'value',
        'attribute_id',
    ];

    public function attribute(): BelongsTo {
        return $this->belongsTo(Attribute::class);
    }
}
