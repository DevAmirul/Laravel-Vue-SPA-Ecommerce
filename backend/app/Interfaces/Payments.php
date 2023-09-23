<?php

namespace App\Interfaces;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

interface Payments
{
    public function checkOut(?object $orderId) : array;
    public function success() : RedirectResponse;
    public function cancel() : RedirectResponse;
}
