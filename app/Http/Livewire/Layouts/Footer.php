<?php

namespace App\Http\Livewire\Layouts;

use App\Models\GeneralSettings;
use Livewire\Component;

class Footer extends Component {
    public function render() {
        $settings = GeneralSettings::find(1,['name']);
        return view('livewire.layouts.footer', [
            'settings' => $settings,
        ]);
    }
}
