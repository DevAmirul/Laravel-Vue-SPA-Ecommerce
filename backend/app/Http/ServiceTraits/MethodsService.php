<?php

namespace App\Http\ServiceTraits;

trait MethodsService {
    public ?int $methodId = null;
    public string $name = '';
    public string $cost = '';

    protected array $rules = [
        'name' => 'required|string|max:100',
        'cost' => 'required|numeric',
    ];

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules);
    }
}
