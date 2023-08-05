<?php

namespace App\Http\Controllers\Api\Frontend\Layouts;

use App\Models\Section;
use Illuminate\Http\Response;

class SidebarController {

    public function sidebarCategory(): Response{
        $sidebarCategory = Section::with([
            'category:id,section_id,name' => [
                'subCategory:id,category_id,name',
            ],
        ])->get(['id', 'name']);

        return response(compact('sidebarCategory'), 200);
    }

    public function sidebarFilter(): Response{
        $sidebarCategory = Section::with([
            'category:id,section_id,name' => [
                'subCategory:id,category_id,name',
            ],
        ])->get(['id', 'name']);

        return response(compact('sidebarCategory'), 200);
    }
}
