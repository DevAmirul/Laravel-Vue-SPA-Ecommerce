@push('title')
Editors Create
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

    <x-form pageTitle='Update Editor' action='update'>
        <x-form-input-field.general col="col-6" lable="Editors name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors email" name="email" type="email" wireModel='email'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors phone" name="phone" type="text" wireModel='phone'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors city" name="city" type="text" wireModel='city'>
        </x-form-input-field.general>
        <x-form-input-field.select-for-array col='col-6' defaultOption='Select Role' :options='$roleOption'
            wireModel='selectedRole' colName='name' name="selectedRole">
        </x-form-input-field.select-for-array>
        <x-form-input-field.general col="col-6" lable="Editors address" name="address" type="text" wireModel='address'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors state" name="state" type="text" wireModel='state'>
        </x-form-input-field.general>
        <x-form-input-field.select-for-array col='col-6' defaultOption='Select Status' :options='$statusOption'
            wireModel='selectedStatus' colName='name' name="selectedStatus">
        </x-form-input-field.select-for-array>
        <x-form-input-field.general col="col-6" lable="Editors password" name="password" type="password" wireModel='password'>
        </x-form-input-field.general>


        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>