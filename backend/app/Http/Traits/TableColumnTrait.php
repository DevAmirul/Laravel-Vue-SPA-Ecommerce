<?php

namespace App\Http\Traits;

trait TableColumnTrait {
    public int $showDataPerPage = 10;
    public string $searchStr    = '';
    public array $columnNamesArr;
    public array $tableDataColumnNames;

    /**
     * Set table columns name.
     */
    public function tableColumnTrait(array $columnNamesArr, array $tableDataColumnNames): void {
        $this->columnNamesArr = $columnNamesArr;
        $this->tableDataColumnNames = $tableDataColumnNames;
    }

}
