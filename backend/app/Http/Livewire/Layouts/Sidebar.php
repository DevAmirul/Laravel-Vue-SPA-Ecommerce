<?php

namespace App\Http\Livewire\Layouts;

use Illuminate\View\View;
use Livewire\Component;

class Sidebar extends Component {
    public function render(): View {
        return view('livewire.layouts.sidebar');
    }
}
