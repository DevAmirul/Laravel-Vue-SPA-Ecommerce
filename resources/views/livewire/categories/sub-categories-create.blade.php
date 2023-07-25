@push('title')
Category Create
@endpush

<div>
    <!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->

    <x-form pageTitle='SubCategory Create' >
        <x-form-input-field.general col="col-6" lable="SubCategory name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="SubCategory Slug" name="slug" type="text" wireModel='slug'>
        </x-form-input-field.general>
        <x-form-input-field.select col='col-6' defaultOption='Select Category' :options='$allCategories'
            wireModel='category_id' colName='name' name="category_id">
        </x-form-input-field.select>

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