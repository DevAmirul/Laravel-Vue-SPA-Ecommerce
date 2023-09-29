<?php

namespace App\Http\Livewire\Layouts;

use App\Models\GeneralSettings;
use Illuminate\View\View;
use Livewire\Component;

class Footer extends Component {
    public function render(): View {
        $settings = GeneralSettings::first('name');
        
        return view('livewire.layouts.footer', [
            'settings' => $settings,
        ]);
    }
}
