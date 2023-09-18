<?php

namespace App\Http\Livewire\Products;

use App\Models\Tag;
use Livewire\Component;

class TagsCreateController extends Component {
    public string $keyword = '';

    protected array $rules = [
        'keyword' => 'required|string|max:100',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): void{
        $validate          = $this->validate();
        
        Tag::create($validate);
        
        $this->reset();
        
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render() {
        return view('livewire.products.tags-create');
    }
}
