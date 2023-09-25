<?php

namespace App\Interfaces;

use Illuminate\Http\RedirectResponse;

interface Payments
{
    public function checkOut(?object $order) : array;
    public function success() : RedirectResponse;
    public function cancel() : RedirectResponse;
}
