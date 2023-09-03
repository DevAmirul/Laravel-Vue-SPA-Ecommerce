<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductView extends Model {
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'product_id',
        'view_count',
    ];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
