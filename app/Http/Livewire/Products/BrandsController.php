<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandsController extends Component {
    public function render() {
        return view('livewire.products.brands');
    }
}
