<?php

namespace App\Http\Traits;

trait FilterSearch {
    use TableColumnTrait;

    public string $groupBy     = 'Today';
    public string $orderStatus = '';
    public string $startDate   = '';
    public string $expireDate  = '';

    /**
     * Update column date name when change groupBy property.
     */
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
