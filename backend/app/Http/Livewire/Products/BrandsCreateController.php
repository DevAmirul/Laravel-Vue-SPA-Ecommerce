<?php

namespace App\Http\Livewire\Products;

use App\Http\ServiceTraits\BrandsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Brand;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandsCreateController extends Component {
    use WithFileUploads, CreateSlugTrait, FileTrait, BrandsService;

    public string $pageUrl = 'create';

    /**
     * Create brand.
     */
    public function create(): void {
        $validate = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'brands');

        Brand::create($validate);

        $this->propertyResetExcept();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render(): View {
        return view('livewire.products.brands-create');
    }
}
