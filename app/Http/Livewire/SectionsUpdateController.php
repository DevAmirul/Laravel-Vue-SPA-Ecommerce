<?php

namespace App\Http\Livewire;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Section;
use Livewire\Component;

class SectionsUpdateController extends Component {
    use CateSecValidationTrait;

    public string $name = '';
    public string $slug = '';
    public int $sectionId;

    protected array $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function mount($id): void{
        $this->sectionId = $id;

        $section    = Section::find($this->sectionId, ['name', 'slug']);
        $this->name = $section->name;
        $this->slug = $section->slug;
    }

    public function save() {
        $validate = $this->validate();
        Section::where('id', $this->sectionId)->update($validate);
        return redirect()->route('sections');
    }

    public function render() {
        return view('livewire.sections-update');
    }
}
