<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Attribute;
use Livewire\Component;

class AttributesController extends Component {

    public function destroy($attributeId) : int {
        return Attribute::destroy($attributeId);
    }

    public function render() {
        $attributes = Attribute::with('attributeOption:id,value,attribute_id')->get();
        return view('livewire.products.attributes', [
            'attributes' => $attributes,
        ]);
    }
}
