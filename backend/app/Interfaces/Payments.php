<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface Payments
{
    public function checkOut() : string;
    public function success();
    public function cancel();
}
