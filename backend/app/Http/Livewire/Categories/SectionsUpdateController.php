<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SectionsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class SectionsUpdateController extends Component {
    use WithFileUploads, CreateSlugTrait, FileTrait, SectionsService;

    public string $pageUrl = 'update';

    public function mount($id): void {
        $this->statusOption = ['Unpublish', 'Publish'];
        $this->sectionId    = $id;

        $sections       = Section::find($this->sectionId, ['name', 'image', 'slug', 'status']);
        $this->name     = $sections->name;
        $this->oldImage = $sections->image;
        $this->slug     = $sections->slug;
        $this->status   = $sections->status;
    }

    public function save() {
        $validate = $this->validate();
        if (gettype($this->image) == 'object') $validate['image'] = $this->fileUpload($this->image, 'sections');

        Section::where('id', $this->sectionId)->update($validate);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render() {
        return view('livewire.categories.sections-update');
    }
}
