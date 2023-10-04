@push('title')
Sections Create
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

    <x-form pageTitle='Sections Create' action='update'>
        <x-form-input-field.general col="col-6" lable="Section name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Section Slug" name="slug" type="text" wireModel='slug'>
        </x-form-input-field.general>
        <x-form-input-field.file col="col-6" label="Upload Image" name="image" wireModel='image'>
        </x-form-input-field.file>
        <x-form-input-field.select-for-array col='col-6' defaultOption='Select Status' :options='$statusOption'
            wireModel='status' colName='name' name="status">
        </x-form-input-field.select-for-array>
        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>