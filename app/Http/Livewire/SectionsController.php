<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Section;
use Livewire\Component;

class SectionsController extends Component {

    use TableHeaderTrait;

    public function mount(): void{
        $this->traitMount(
            ['Id', 'Name', 'Slug'],
            ['id', 'name', 'slug']
        );
    }

    public function update($sectionId) {
        return redirect()->route('sections.update', $sectionId);
    }

    public function render() {
        $sections = Section::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
        return view('livewire.sections',[
            'sections'=> $sections
        ]);
    }
}
