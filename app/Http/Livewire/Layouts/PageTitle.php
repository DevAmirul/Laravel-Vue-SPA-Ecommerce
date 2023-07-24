<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class PageTitle extends Component {
    public string $pageTitle;
    
    public function mount($pageTitle) : void {
        $this->pageTitle = $pageTitle;
    }

    public function render() {
        return view('livewire.layouts.page-title');
    }
}
