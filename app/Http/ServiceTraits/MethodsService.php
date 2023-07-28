<?php

namespace App\Http\ServiceTraits;

trait MethodsService {
    public int $methodId;
    public string $name = '';
    public string $cost = '';

    protected array $rules = [
        'name' => 'required|string|max:100',
        'cost' => 'required|numeric',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function propertyResetExcept(): void{
        $this->resetExcept('methodId');
    }
}
