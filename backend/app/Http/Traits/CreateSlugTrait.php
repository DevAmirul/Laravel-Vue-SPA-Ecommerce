<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait CreateSlugTrait {
    /**
     * Create slug when name is updated.
     */
    public function updatedName(): void{
        $this->slug = Str::slug($this->name);
    }
}
