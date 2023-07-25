<?php

namespace App\Http\Traits;

trait EnumTrait {
    public array $enumAttributes;
    public array $enumColNames;
    public array $enumClasses;

    public function enumTrait(array $enumColNames, array $enumAttributes, array $enumClasses): void{
        $this->enumColNames   = $enumColNames;
        $this->enumAttributes = $enumAttributes;
        $this->enumClasses    = $enumClasses;
    }
}
