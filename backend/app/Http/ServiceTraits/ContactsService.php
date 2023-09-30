<?php

namespace App\Http\ServiceTraits;

trait ContactsService {
    public int $contactId;
    public string $name;
    public string $email;
    public string $subject;
    public string $message;
    public string $repliedSubject;
    public string $repliedMessage;

    protected $rules = [
        'repliedSubject' => 'required|string|max:255',
        'repliedMessage' => 'required|string|max:65000',
    ];

    public function updated(mixed $propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }
}
