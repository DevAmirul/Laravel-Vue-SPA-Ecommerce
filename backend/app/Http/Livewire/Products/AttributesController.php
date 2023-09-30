<?php

namespace App\Http\Livewire\Products;

use App\Models\Attribute;
use Illuminate\View\View;
use Livewire\Component;

class AttributesController extends Component {

    /**
     * Delete attribute.
     */
    public function destroy(int $attributeId): void {
        Attribute::destroy($attributeId);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Deleted record!']);
    }

    public function render(): View {
        $attributes = Attribute::with('attributeOption:id,value,attribute_id')->get();

        return view('livewire.products.attributes', [
            'attributes' => $attributes,
        ]);
    }
}
