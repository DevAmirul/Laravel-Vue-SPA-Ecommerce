<?php

namespace App\Http\ServiceTraits;

trait OffersService {
    public int $offerId;
    public object $categories;
    public object $subCategories;
    public object $brands;
    public string $name                 = '';
    public string $discount             = '';
    public string $type                 = '';
    public ?int $status                 = null;
    public string $start_date           = '';
    public string $expire_date          = '';
    public array $selectedCategories    = [];
    public array $selectedSubCategories = [];
    public array $selectedBrands        = [];
    public array $offersTypeOption      = ['percentage', 'decimal'];
    public array $statusOption          = ['Unpublish', 'Publish'];

    protected array $rules = [
        'name'       => 'required|string|max:100',
        'discount'    => 'required|string|max:255',
        'type'        => 'required',
        'status'      => 'required|boolean',
        'start_date'  => 'required|date',
        'expire_date' => 'required|date',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function propertyResetExcept(): void{
        $this->resetExcept(['editorsId', 'selectedRole', 'selectedStatus']);
    }
}
