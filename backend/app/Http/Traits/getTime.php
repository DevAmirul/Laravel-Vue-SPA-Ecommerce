<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait getTime {

    /**
     * Get carbon time.
     */
    public function getTimeCarbon(string $timeStr): object {
        return match ($timeStr) {
            'This Month' => Carbon::now()->startOfMonth(),
            'This Year' => Carbon::now()->startOfYear(),
            default => Carbon::today(),
        };
    }

    /**
     * Get time in SQL format.
     */
    public function getTimeSql(string $timeStr, string $tableColumnName) {
        return match ($timeStr) {
            'This Month' => 'MONTHNAME(' . $tableColumnName . ')',
            'This Year' => 'YEAR(' . $tableColumnName . ')',
            default => 'DATE(' . $tableColumnName. ')',
        };
    }
}
