<?php

namespace App\Http\Traits;

trait TableHeaderTrait {

    public int $showDataPerPage;
    public string $searchStr = '';
    public array $columnNamesArr;
    public array $tableDataColumnNames;

    public function traitMount(array $columnNamesArr, array $tableDataColumnNames): void{
        $this->showDataPerPage      = 10;
        $this->columnNamesArr       = $columnNamesArr;
        $this->tableDataColumnNames = $tableDataColumnNames;
    }

}
