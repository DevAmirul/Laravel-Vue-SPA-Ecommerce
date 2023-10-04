<?php

namespace App\Http\ServiceTraits;

trait SubCategoriesService {
    public int $subCategoryId;
    public object $categories;
    public string $name        = '';
    public string $slug        = '';
    public ?int $category_id   = null;
    public ?int $status        = null;
    public array $statusOption = ['Unpublish', 'Publish'];

    protected function rules()
    {
        if ($this->pageUrl == 'update') {
            $rulesForUpdate = [
                'name'        => 'required|string|max:255',
                'slug'        => 'required|string|max:255|unique:brands,slug,' . $this->subCategoryId,
                'status'      => 'required|boolean',
                'category_id' => 'required|numeric',
            ];

            return $rulesForUpdate;
        } else {
            return [
                'name'        => 'required|string|max:255',
                'slug'        => 'required|string|max:255|unique:brands,slug',
                'status'      => 'required|boolean',
                'category_id' => 'required|numeric',
            ];
        }
    }

    public function updated(mixed $propertyName): void{
        $this->validateOnly($propertyName, $this->rules());
    }

    /**
     * Reset property.
     */
    public function propertyResetExcept(): void{
        $this->resetExcept(['subCategoryId', 'categories']);
    }
}
