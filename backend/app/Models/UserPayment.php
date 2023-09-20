<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserPayment extends Model
{
    use HasFactory;

    function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }
}
