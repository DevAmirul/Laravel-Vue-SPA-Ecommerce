<?php

namespace App\Http\Traits;

trait BooleanTableTrait {
    public $booleanColNames;
    public $booleanAttributes;
    public array $booleanClasses;

    /**
    * Set table boolean column name and set boolean attributes & classes for blade.
     */
    public function booleanTrait(array $booleanColNames = [], array $booleanAttributes = [], array $booleanClasses = []): void{
        $this->booleanColNames   = $booleanColNames;

        $this->booleanAttributes = $booleanAttributes;

        $this->booleanClasses    = $booleanClasses;
    }
}
