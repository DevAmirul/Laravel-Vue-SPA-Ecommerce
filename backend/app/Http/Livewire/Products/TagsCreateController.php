<?php

namespace App\Http\Livewire\Products;

use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Component;

class TagsCreateController extends Component {
    public string $keyword = '';

    protected array $rules = [
        'keyword' => 'required|string|max:100',
    ];

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules);
    }

    /**
     * Create tag.
     */
    public function create(): void {
        $validate = $this->validate();

        Tag::create($validate);

        $this->reset();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render(): View {
        return view('livewire.products.tags-create');
    }
}
