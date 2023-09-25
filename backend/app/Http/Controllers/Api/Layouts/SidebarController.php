<?php

namespace App\Http\Controllers\Api\Layouts;

use App\Models\Attribute as ProductAttribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Section;
use App\Services\CategoryService;
use Illuminate\Http\Response;

class SidebarController {

    public function index(): Response
    {
        $allCategory = $this->getSidebarCategory();
        $sidebarFilter = $this->getSidebarFilter();
        $sidebarBrand = $this->getSidebarBrand();
        return response(compact('allCategory', 'sidebarFilter', 'sidebarBrand'), 200);
    }

    public function getSidebarFilter(): object
    {
        return ProductAttribute::with('attributeOption')->get(['id', 'name']);
    }

    public function getSidebarCategory(): object
    {
        return Section::with([
            'category:id,section_id,name,slug' => [
                'subCategory:id,category_id,name,slug',
            ]
        ])->get(['id', 'name']);
    }

    public function getSidebarBrand(): object
    {
        return Brand::all(['name', 'slug']);
    }


}
