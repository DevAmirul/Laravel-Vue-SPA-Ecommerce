<?php

namespace App\Http\ServiceTraits;

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

            if (gettype($this->image) == 'object') {
                $rulesForUpdate['image'] = 'required|mimes:jpeg,png,jpg';
            }

            return $rulesForUpdate;
        } else {
            return [
                'name'       => 'required|string|max:255',
                'slug'       => 'required|string|max:255',
                'section_id' => 'required|numeric',
                'status'     => 'required|boolean',
                'image'      => 'required|mimes:jpeg,png,jpg',
            ];
        }
    }

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules());
    }

    /**
     * Reset some property.
     */
    public function propertyResetExcept(): void {
        $this->resetExcept(['categoryId', 'sections', 'image', 'oldImage']);
    }
}
