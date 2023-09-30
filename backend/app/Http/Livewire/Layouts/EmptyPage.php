<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class EmptyPage extends Component {
    public string $tableName;

    /**
     * Set table name when empty page component mount.
     */
    public function mount(string $tableName): void {
        $this->tableName = $tableName;
    }
    public function render() {
        return view('livewire.layouts.empty-page');
    }
}
