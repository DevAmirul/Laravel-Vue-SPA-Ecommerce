<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandsUpdateController extends Component {
    use WithFileUploads, FileTrait, CateSecValidationTrait;

    public int $brandId;
    public string $name;
    public string $slug;
    public int $status;
    public array $statusOption;
    public $image;
    public $oldImage;

    protected function rules() {
        $rules = [
            'name'   => 'required|string|max:255',
            'slug'   => 'required|string|max:255',
            'status' => 'required|boolean',
        ];
        if (gettype($this->image) == 'object') {
            $rules['image'] = 'required|mimes:jpeg,png,jpg';
        }
        return $rules;
    }

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules());
    }

    public function mount($id): void{
        $this->statusOption = ['Unpublish', 'Publish'];
        $this->brandId      = $id;

        $category         = Brand::find($this->brandId, ['name', 'image', 'slug', 'status']);
        $this->name       = $category->name;
        $this->image      = $category->image;
        $this->oldImage   = $category->image;
        $this->slug       = $category->slug;
        $this->status     = $category->status;
    }

    public function save() {
        $validate = $this->validate();
        if (gettype($this->image) == 'object') {
            $validate['image'] = $this->fileUpload($this->image, 'category');
        }
        Brand::where('id', $this->brandId)->update($validate);
        return redirect()->route('brands');
    }

    public function render() {
        return view('livewire.products.brands-update');
    }
}
