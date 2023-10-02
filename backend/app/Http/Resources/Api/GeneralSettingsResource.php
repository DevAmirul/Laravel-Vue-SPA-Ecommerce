<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class GeneralSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'logo' => asset(Storage::url('img/' . $this->logo)),
            'banner' => asset(Storage::url('img/' . $this->banner)),
            'email' => $this->email,
            'phone' => $this->phone,
            'slogan' => $this->slogan,
            'address' => $this->address,
            'facebook' => $this->facebook,
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
        ];
    }
}
