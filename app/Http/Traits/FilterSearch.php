<?php

namespace App\Http\Traits;

trait FilterSearch {
    public string $orderStatus = '';
    public string $groupBy     = 'Today';
    public string $startDate   = '';
    public string $expireDate  = '';

    public function updatedGroupBy(): void {
        if ($this->groupBy == 'This Month') {
            $this->columnNamesArr[sizeof($this->tableDataColumnNames) - 1] = 'Month';
        } else if ($this->groupBy == 'This Year') {
            $this->columnNamesArr[sizeof($this->tableDataColumnNames) - 1] = 'Year';
        } else {
            $this->columnNamesArr[sizeof($this->tableDataColumnNames) - 1] = 'Date';
        }
    }
}
