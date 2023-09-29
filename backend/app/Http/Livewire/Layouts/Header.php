<?php

namespace App\Http\Livewire\Layouts;

use Illuminate\View\View;
use Livewire\Component;

class Header extends Component {
    public function render(): View {
        return view('livewire.layouts.header');
    }
}
