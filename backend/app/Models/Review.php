<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model {
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'rating_value',
        'comment',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
