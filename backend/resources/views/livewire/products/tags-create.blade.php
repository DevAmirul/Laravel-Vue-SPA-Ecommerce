@push('title')
Tags Create
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

    <x-form pageTitle='Tags Create' action='create'>
        <x-form-input-field.general col="col-12" lable="Tag keyword" name="keyword" type="text" wireModel='keyword'>
        </x-form-input-field.general>
        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

<!-- End #main -->
<!-- ======= Footer ======= -->
@livewire('layouts.footer')
<!-- End Footer -->
</div>