
@push('title')
Settings
@endpush

<div>
    <!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <hr>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-form pageTitle='Settings' enctype="multipart/form-data" action='update'>
        <x-form-input-field.general col="col-6" lable="Site name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Site slogan" name="slogan" type="text"
            wireModel='slogan'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Email" name="email" type="email" wireModel='email'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Phone" name="phone" type="text" wireModel='phone'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Phone 2" name="phone_2" type="text" wireModel='phone_2'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Address" name="address" type="text" wireModel='address'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Zip Code" name="zip_code" type="text" wireModel='zip_code'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Facebook" name="facebook" type="text" wireModel='facebook'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Youtube" name="youtube" type="text" wireModel='youtube'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Twitter" name="twitter" type="text" wireModel='twitter'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Instagram" name="instagram" type="text" wireModel='instagram'>
        </x-form-input-field.general>
        <x-form-input-field.file col="col-6" label="Upload site logo" name="logo" wireModel='logo'>
        </x-form-input-field.file>
        <x-form-input-field.file col="col-6" label="Upload site banner" name="banner" wireModel='banner'>
        </x-form-input-field.file>
        <x-form-input-field.submit color='primary' buttonName="Save Settings"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>