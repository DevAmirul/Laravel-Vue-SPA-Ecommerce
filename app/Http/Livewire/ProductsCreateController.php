<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Section;
use Livewire\Component;

class ProductsCreateController extends Component {
    public int $selectSection;
    public  $categories = null;

    public function updated() {
        $this->categories = Category::where('section_id', $this->selectSection)
            ->get(['id', 'name']);
    }

    public function render() {
        $sections = Section::all(['id', 'name']);

        return view('livewire.products-create', [
            'sections'   => $sections,
            'categories' => $this->categories,
        ]);
    }
}
