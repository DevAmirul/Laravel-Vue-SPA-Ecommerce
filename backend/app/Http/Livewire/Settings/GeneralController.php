<?php

namespace App\Http\Livewire\Settings;

use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\GeneralSettings;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class GeneralController extends Component {
    use WithFileUploads, FileTrait, CreateSlugTrait;

    public int $settingsId;
    public string $name;
    public string $slogan;
    public string $email;
    public string $phone;
    public string $phone_2;
    public string $address;
    public string $zip_code;
    public string $facebook;
    public string $youtube;
    public string $twitter;
    public string $instagram;
    public string $oldLogoName;
    public string $oldBannerName;
    public $logo;
    public $banner;

    protected function rules() {
        $rules = [
            'name'      => 'required|string|max:255',
            'slogan'    => 'required|string',
            'email'     => 'required|string|max:255',
            'phone'     => 'required|string|max:11',
            'phone_2'   => 'required|string|max:11',
            'address'   => 'required|string|max:255',
            'zip_code'  => 'required|string|max:255',
            'facebook'  => 'required|string|max:255',
            'youtube'   => 'required|string|max:255',
            'twitter'   => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
        ];

        if (gettype($this->logo) == 'object') {
            $rules['logo'] = 'required|mimes:jpeg,png,jpg';
        } elseif (empty($this->logo)) {
            $rules['logo'] = 'required|mimes:jpeg,png,jpg';
        }

        if (gettype($this->banner) == 'object') {
            $rules['banner'] = 'required|mimes:jpeg,png,jpg';
        } elseif (empty($this->banner)) {
            $rules['banner'] = 'required|mimes:jpeg,png,jpg';
        }
        return $rules;
    }

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules());
    }

    /**
     * Get app setting.
     */
    public function mount(): void {
        $settings = GeneralSettings::firstOrFail();

        $this->settingsId    = $settings->id ?? 1;
        $this->name          = $settings->name ?? '';
        $this->logo          = $settings->logo ?? '';
        $this->oldLogoName   = $settings->logo ?? '';
        $this->banner        = $settings->banner ?? '';
        $this->oldBannerName = $settings->banner ?? '';
        $this->slogan        = $settings->slogan ?? '';
        $this->email         = $settings->email ?? '';
        $this->phone         = $settings->phone ?? '';
        $this->phone_2       = $settings->phone_2 ?? '';
        $this->address       = $settings->address ?? '';
        $this->zip_code      = $settings->zip_code ?? '';
        $this->facebook      = $settings->facebook ?? '';
        $this->youtube       = $settings->youtube ?? '';
        $this->twitter       = $settings->twitter ?? '';
        $this->instagram     = $settings->instagram ?? '';
    }

    /**
     * Update setting.
     */
    public function update(): void {
        $validate = $this->validate();

        if (!empty($this->oldLogoName) && (gettype($this->logo) == 'object')) {
            $this->fileDestroy($this->oldLogoName, 'img');

            $validate['logo'] = $this->fileUpload($this->logo, 'img');

        } elseif (gettype($this->logo) == 'object') {
            $validate['logo'] = $this->fileUpload($this->logo, 'img');
        }
        if (!empty($this->oldBannerName) && (gettype($this->banner) == 'object')) {
            $this->fileDestroy($this->oldBannerName, 'img');

            $validate['banner'] = $this->fileUpload($this->banner, 'img');

        } elseif (gettype($this->banner) == 'object') {
            $validate['banner'] = $this->fileUpload($this->banner, 'img');
        }

        GeneralSettings::updateOrCreate(['id' => $this->settingsId], $validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.settings.general');
    }
}
