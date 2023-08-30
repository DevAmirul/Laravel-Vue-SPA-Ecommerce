<?php

namespace App\Http\Livewire\Products;

use App\Http\ServiceTraits\BrandsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandsCreateController extends Component {
    use WithFileUploads, CreateSlugTrait, FileTrait, BrandsService;
    
    public string $pageUrl = 'create';

    public function save(): void{
        $validate          = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'section');
        Brand::create($validate);
        $this->propertyResetExcept();
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render() {
        return view('livewire.products.brands-create');
    }
}
