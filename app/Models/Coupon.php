<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'discount',
        'type',
        'status',
        'start_date',
        'expire_date',
    ];
}
