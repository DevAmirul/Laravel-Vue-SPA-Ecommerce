<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait CateSecValidationTrait {
    
    public function updatedName(): void{
        $this->slug = Str::slug($this->name);
    }

}
