<?php

namespace App\Http\ServiceTraits;

trait BrandsService {
    public int $brandId;
    public string $name        = '';
    public string $slug        = '';
    public int | null $status  = null;
    public array $statusOption = ['Unpublish', 'Publish'];
    public string $oldImage;
    public $image;

    protected function rules() {
        if ($this->pageUrl == 'update') {
            $rulesForUpdate = [
                'name'   => 'required|string|max:255',
                'slug'   => 'required|string|max:255|unique:brands,slug,' . $this->brandId,
                'status' => 'required|boolean',
            ];
            if (gettype($this->image) == 'object') {
                $rulesForUpdate['image'] = 'required|mimes:jpeg,png,jpg';
            }

            return $rulesForUpdate;
        } else {
            return [
                'name'   => 'required|string|max:255',
                'slug'   => 'required|string|max:255|unique:brands,slug',
                'status' => 'required|boolean',
                'image'  => 'required|mimes:jpeg,png,jpg',
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
        $this->resetExcept(['brandId', 'oldImage']);
    }
}
