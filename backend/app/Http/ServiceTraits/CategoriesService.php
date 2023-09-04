<?php

namespace App\Http\ServiceTraits;

use Illuminate\Validation\Rule;

trait CategoriesService {
    public string $name        = '';
    public string $slug        = '';
    public ?int $section_id    = null;
    public ?int $status        = null;
    public array $statusOption = ['Unpublish', 'Publish'];
    public int $categoryId;
    public object $sections;
    public $image;
    public $oldImage;

    protected function rules() {
        if ($this->pageUrl == 'update') {
            $rulesForUpdate = [
                'name'       => 'required|string|max:255',
                'slug'       => 'required|string|max:255|unique:brands,slug,' . $this->categoryId,
                'section_id' => 'required|numeric',
                'status'     => 'required|boolean',
            ];

            (gettype($this->image) == 'object') ? $rulesForUpdate['image'] = 'required|mimes:jpeg,png,jpg' : null;
            return $rulesForUpdate;
        }
        else {
            return [
                'name'       => 'required|string|max:255',
                'slug'       => 'required|string|max:255',
                'section_id' => 'required|numeric',
                'status'     => 'required|boolean',
                'image'      => 'required|mimes:jpeg,png,jpg',
            ];
        }
    }

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules());
    }

    public function propertyResetExcept(): void{
        $this->resetExcept(['categoryId', 'sections', 'image', 'oldImage']);
    }
}
