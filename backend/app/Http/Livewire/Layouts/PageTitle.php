<?php

namespace App\Http\Livewire\Layouts;

use Illuminate\View\View;
use Livewire\Component;

class PageTitle extends Component {
    public string $pageTitle;

    /**
     * Set page title when component mount.
     */
    public function mount(string $pageTitle): void {
        $this->pageTitle = $pageTitle;
    }

    public function render(): View {
        return view('livewire.layouts.page-title');
    }
}
