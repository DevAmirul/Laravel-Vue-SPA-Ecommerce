<?php

namespace App\Http\ServiceTraits;

trait CouponsService {
    public int $couponId;
    public string $name           = '';
    public string $code            = '';
    public string $discount        = '';
    public string $type            = '';
    public ?int $status            = null;
    public string $start_date      = '';
    public string $expire_date     = '';
    public array $couponTypeOption = ['percentage', 'decimal'];
    public array $statusOption     = ['Unpublish', 'Publish'];

    protected array $rules = [
        'title'       => 'required|string|max:100',
        'code'        => 'required|string|max:100',
        'discount'    => 'required|string|max:255',
        'type'        => 'required|in:percentage,decimal',
        'status'      => 'required|boolean',
        'start_date'  => 'required|date',
        'expire_date' => 'required|date',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function propertyResetExcept(): void{
        $this->resetExcept(['couponId']);
    }
}
