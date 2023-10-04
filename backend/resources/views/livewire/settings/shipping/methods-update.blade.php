@push('title')
Shipping Methods Update
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

    <x-form pageTitle='Shipping Methods Update' action='update'>
        <x-form-input-field.general col="col-6" lable="Shipping methods name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>

        <x-form-input-field.general col="col-6" lable="Shipping methods cost" name="cost" type="text" wireModel='cost'>
        </x-form-input-field.general>

        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>