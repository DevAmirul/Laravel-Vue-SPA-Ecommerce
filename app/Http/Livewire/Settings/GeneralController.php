<?php

namespace App\Http\Livewire\Settings;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use App\Models\GeneralSettings;
use Livewire\Component;
use Livewire\WithFileUploads;

class GeneralController extends Component {
    use WithFileUploads, FileTrait, CateSecValidationTrait;

    public int $settingsId;
    public string $site_name;
    public $site_logo;
    public string $site_slogan;
    public string $email;
    public string $phone;
    public string $phone_2;
    public string $address;
    public string $zip_code;
    public string $facebook;
    public string $youtube;
    public string $twitter;
    public string $instagram;
    public string $oldSiteLogoName;

    protected function rules() {
        $rules = [
            'site_name'   => 'required|string|max:255',
            'site_slogan' => 'required|string',
            'email'       => 'required|string|max:255',
            'phone'       => 'required|string|max:11',
            'phone_2'     => 'required|string|max:11',
            'address'     => 'required|string|max:255',
            'zip_code'    => 'required|string|max:255',
            'facebook'    => 'required|string|max:255',
            'youtube'     => 'required|string|max:255',
            'twitter'     => 'required|string|max:255',
            'instagram'   => 'required|string|max:255',
        ];
        if (gettype($this->site_logo) == 'object') {
            $rules['site_logo'] = 'required|mimes:jpeg,png,jpg';
        } elseif (empty($this->site_logo)) {
            $rules['site_logo'] = 'required|mimes:jpeg,png,jpg';
        }
        return $rules;
    }

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules());
    }

    public function mount(): void{
        $settings = GeneralSettings::first();

        $this->settingsId      = $settings->id ?? 1;
        $this->site_name       = $settings->site_name ?? '';
        $this->site_logo       = $settings->site_logo ?? '';
        $this->oldSiteLogoName = $settings->site_logo ?? '';
        $this->site_slogan     = $settings->site_slogan ?? '';
        $this->email           = $settings->email ?? '';
        $this->phone           = $settings->phone ?? '';
        $this->phone_2         = $settings->phone_2 ?? '';
        $this->address         = $settings->address ?? '';
        $this->zip_code        = $settings->zip_code ?? '';
        $this->facebook        = $settings->facebook ?? '';
        $this->youtube         = $settings->youtube ?? '';
        $this->twitter         = $settings->twitter ?? '';
        $this->instagram       = $settings->instagram ?? '';

    }

    public function save(): void{
        $validate = $this->validate();

        if (!empty($this->oldSiteLogoName) && (gettype($this->site_logo) == 'object')) {
            $this->fileDestroy($this->oldSiteLogoName, 'img');
            $validate['site_logo'] = $this->fileUpload($this->site_logo, 'img');
        } elseif (gettype($this->site_logo) == 'object') {
            $validate['site_logo'] = $this->fileUpload($this->site_logo, 'img');
        }
        GeneralSettings::updateOrCreate(['id' => $this->settingsId], $validate);
    }

    public function render() {
        return view('livewire.settings.general');
    }
}
