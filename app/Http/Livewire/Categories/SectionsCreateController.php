<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class SectionsCreateController extends Component {
    use WithFileUploads, CateSecValidationTrait, FileTrait;

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
        $validate = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'section');
        Section::create($validate);
        $this->reset();
        return true;
    }

    public function render() {
        return view('livewire.categories.sections-create');
    }
}
