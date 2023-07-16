<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class SectionsUpdateController extends Component {
    use WithFileUploads, CateSecValidationTrait, FileTrait;

    public int $sectionId;
    public string $name = '';
    public string $slug = '';
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
        $this->sectionId    = $id;

        $section        = Section::find($this->sectionId, ['name', 'image', 'slug', 'status']);
        $this->name     = $section->name;
        $this->image    = $section->image;
        $this->oldImage = $section->image;
        $this->slug     = $section->slug;
        $this->status   = $section->status;
    }

    public function save() {
        $validate = $this->validate();
        if (gettype($this->image) == 'object') {
            $validate['image'] = $this->fileUpload($this->image, 'section');
        }

        Section::where('id', $this->sectionId)->update($validate);
        return redirect()->route('sections');
    }

    public function render() {
        return view('livewire.categories.sections-update');
    }
}
