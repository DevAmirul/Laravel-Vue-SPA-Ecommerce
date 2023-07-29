<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait FilterSearch {
    public string $orderStatus = '';
    public string $groupBy = 'Today';
    public string $startDate = '';
    public string $expireDate = '';

}
