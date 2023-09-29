@push('title')
Product Create
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

    <!-- End Page Title -->
    <x-form pageTitle='Coupons Create' action='create'>
        <x-form-input-field.general col="col-6" lable="Coupon name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Coupon discount" name="discount" type="text"
            wireModel='discount'>
        </x-form-input-field.general>
        <x-form-input-field.select-for-enum col='col-6' defaultOption='Select Coupon type' :options='$couponTypeOption'
            wireModel='type' colName='name' name="type">
        </x-form-input-field.select-for-enum>

        <x-form-input-field.general col="col-6" lable="Coupon code" name="code" type="text" wireModel='code'>
        </x-form-input-field.general>


        <x-form-input-field.select-for-array col='col-6' defaultOption='Select Status' :options='$statusOption'
            wireModel='status' colName='name' name="status">
        </x-form-input-field.select-for-array>

        <div class="col-6"><input wire:model='start_date' class="form-control" id="start_date" type="text"
                name="start_date" placeholder="Pick start Date" aria-label="Start Date">
            @error( 'start_date' ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror</div>

        <div class="col-6"><input wire:model='expire_date' class="form-control" id="expire_date" type="text"
                name="expire_date" placeholder="Pick expire Date" aria-label="Start Date">
            @error( 'expire_date' ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror</div>

        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>
