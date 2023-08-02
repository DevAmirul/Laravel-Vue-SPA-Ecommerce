<?php

namespace App\Http\Traits;

trait TableColumnTrait {

    public int $showDataPerPage;
    public string $searchStr = '';
    public array $columnNamesArr;
    public array $tableDataColumnNames;


    public function tableColumnTrait(array $columnNamesArr, array $tableDataColumnNames): void{
        $this->showDataPerPage      = 10;
        $this->columnNamesArr       = $columnNamesArr;
        $this->tableDataColumnNames = $tableDataColumnNames;

    }

}
