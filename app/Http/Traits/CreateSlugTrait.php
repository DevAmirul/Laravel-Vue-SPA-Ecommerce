<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait CreateSlugTrait {
    public function updatedName(): void{
        $this->slug = Str::slug($this->name);
    }
}
