<?php

namespace App\Http\Controllers\Api\Frontend\Layouts;

use App\Models\Attribute as ModelsAttribute;
use App\Models\Section;
use Illuminate\Http\Response;

class SidebarController {

    public function index(): Response {
        return response(['sidebarCategory' => $this->sidebarCategory(), 'sidebarFilter' => $this->sidebarFilter()], 200);
    }

    public function sidebarCategory(): object {
        return Section::with([
            'category:id,section_id,name,slug' => [
                'subCategory:id,category_id,name,slug',
            ],
        ])->get(['id', 'name']);
    }

    public function sidebarFilter(): object {
        return ModelsAttribute::with('attributeOption')->get(['id', 'name']);
    }
}
