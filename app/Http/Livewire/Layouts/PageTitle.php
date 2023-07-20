<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class PageTitle extends Component {
    public string $pageTitle;
    public string $pageUrl;
    public function mount($pageTitle, $pageUrl) : void {
        $this->pageTitle = $pageTitle;
        $this->pageUrl = $pageUrl;
    }
    public function render() {
        return view('livewire.layouts.page-title');
    }
}
