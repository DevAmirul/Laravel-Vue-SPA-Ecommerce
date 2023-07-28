<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait getTime {
    public function getTimeCarbon(string $timeStr): object {
        return match ($timeStr) {
            'This Weeks' => Carbon::now()->startOfWeek(),
            'This Month' => Carbon::now()->startOfMonth(),
            'This Year' => Carbon::now()->startOfYear(),
            default => Carbon::today(),
        };
    }

    public function getTimeSql(string $timeStr, string $tableColumnName) {
        return match ($timeStr) {
            'This Weeks' => 'WEEKDAY(' . $tableColumnName . ')',
            'This Month' => 'MONTHNAME(' . $tableColumnName . ')',
            'This Year' => 'YEAR(' . $tableColumnName . ')',
            default => $tableColumnName,
        };
    }

    
}
