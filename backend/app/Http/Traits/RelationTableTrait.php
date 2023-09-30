<?php

namespace App\Http\Traits;

trait RelationTableTrait {
    public string $relationName;
    public array $relationTableDataColumnNames;

    /**
     * Set multiple table relation name.
     */
    public function RelationTrait(string $relationName, array $relationTableDataColumnNames): void {
        $this->relationName                 = $relationName;
        $this->relationTableDataColumnNames = $relationTableDataColumnNames;
    }
}
