<?php

namespace App\Http\Traits;

trait BooleanTrait {
    public $booleanColNames;
    public $booleanAttributes;
    public array $booleanClasses;

    public function booleanTrait(array $booleanColNames = [], array $booleanAttributes = [], array $booleanClasses = []): void{
        $this->booleanColNames   = $booleanColNames;
        $this->booleanAttributes = $booleanAttributes;
        $this->booleanClasses      = $booleanClasses;
    }
}
