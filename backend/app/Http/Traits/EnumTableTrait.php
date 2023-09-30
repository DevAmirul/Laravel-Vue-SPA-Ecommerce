<?php

namespace App\Http\Traits;

trait EnumTableTrait {
    public array $enumAttributes;
    public array $enumColNames;
    public array $enumClasses;

    /**
     * Set table enum name and set attributes & classes for blade.
     */
    public function enumTrait(array $enumColNames, array $enumAttributes, array $enumClasses): void {
        $this->enumColNames = $enumColNames;

        $this->enumAttributes = $enumAttributes;

        $this->enumClasses = $enumClasses;
    }
}
