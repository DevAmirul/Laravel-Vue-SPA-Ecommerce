<?php

namespace App\Http\Controllers\Api\Frontend\Layouts;

use App\Models\Attribute as ModelsAttribute;
use App\Models\Category;
use App\Models\Section;
use App\Services\CategoryService;
use Illuminate\Http\Response;

class SidebarController {

    public function index(): Response {
        $allCategory = Section::with([
            'category:id,section_id,name,slug' => [
                'subCategory:id,category_id,name,slug',
            ]
        ])->get(['id', 'name']);
        $sidebarFilter = $this->sidebarFilter();
        return response(compact('allCategory','sidebarFilter'), 200);
    }

    public function sidebarFilter(): object {
        return ModelsAttribute::with('attributeOption')->get(['id', 'name']);
    }


}
