<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SectionsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Section;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class SectionsUpdateController extends Component {
    use WithFileUploads, CreateSlugTrait, FileTrait, SectionsService;

    public string $pageUrl = 'update';

    /**
     * Get section by id.
     */
    public function mount(int $id): void {
        $this->sectionId    = $id;
        $this->statusOption = ['Unpublish', 'Publish'];

        $sections = Section::findOrFail($this->sectionId, ['name', 'image', 'slug', 'status']);

        $this->name     = $sections->name;
        $this->oldImage = $sections->image;
        $this->slug     = $sections->slug;
        $this->status   = $sections->status;
    }

    /**
     * Update section.
     */
    public function update() {
        $validate = $this->validate();

        if (gettype($this->image) == 'object') {
            $validate['image'] = $this->fileUpload($this->image, 'sections');
        }
        Section::where('id', $this->sectionId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.categories.sections-update');
    }
}
