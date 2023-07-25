<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandsCreateController extends Component {
    use WithFileUploads, CreateSlugTrait, FileTrait;

    public string $name        = '';
    public string $slug        = '';
    public int | null $status  = null;
    public array $statusOption = ['Unpublish', 'Publish'];
    public $image;

    protected array $rules = [
        'name'   => 'required|string|max:255',
        'slug'   => 'required|string|max:255',
        'status' => 'required|boolean',
        'image'  => 'required|mimes:jpeg,png,jpg',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $validate          = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'section');
        Brand::create($validate);
        $this->reset();
        return true;
    }

    public function render() {
        return view('livewire.products.brands-create');
    }
}
