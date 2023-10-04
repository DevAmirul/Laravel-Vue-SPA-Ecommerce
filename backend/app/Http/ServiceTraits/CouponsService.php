<?php

namespace App\Http\ServiceTraits;

trait CouponsService {
    public int $couponId;
    public string $name            = '';
    public string $code            = '';
    public string $discount        = '';
    public ?int $status            = null;
    public string $start_date      = '';
    public string $expire_date     = '';
    public array $statusOption     = ['Unpublish', 'Publish'];

    protected array $rules = [
        'name'        => 'required|string|max:100',
        'code'        => 'required|string|max:100',
        'discount'    => 'required|string|max:255',
        'status'      => 'required|boolean',
        'start_date'  => 'required|date|before:expire_date',
        'expire_date' => 'required|date|after:start_date',
    ];

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules);
    }

    /**
     * Reset some property.
     */
    public function propertyResetExcept(): void {
        $this->resetExcept(['couponId']);
    }
}
