@push('title')
Product Create
@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
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

    <x-form pageTitle='Offers Create'>
        <x-form-input-field.general col="col-6" lable="Offers name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>

        <x-form-input-field.select-for-enum col='col-6' defaultOption='Select Offers type' :options='$offersTypeOption'
            wireModel='type' colName='name' name="type">
        </x-form-input-field.select-for-enum>

        <x-form-input-field.general col="col-6" lable="Offers discount" name="discount" type="text"
            wireModel='discount'>
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

        <div wire:ignore>
            <select id="select-cate" class="form-select" name="state[]" multiple
                placeholder="Select categories...(optional)" autocomplete="off">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div wire:ignore>
            <select id="select-subCate" class="form-select" name="state[]" multiple
                placeholder="Select sub categories...(optional)" autocomplete="off">
                @foreach ($subCategories as $subCategory)
                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div wire:ignore>
            <select id="select-brand" class="form-select" name="state[]" multiple
                placeholder="Select brands...(optional)" autocomplete="off">
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>

        </div>

        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    flatpickr("#start_date", {
        dateFormat: "Y-m-d H:i:s",
        // mode: "range",
        enableTime: true,
        time_24hr: true
    });
    flatpickr("#expire_date", {
        dateFormat: "Y-m-d H:i:s",
        // mode: "range",
        enableTime: true,
        time_24hr: true
    });

    var select = new TomSelect("#select-cate");
    select.on('change',function (value){
        @this.set('selectedCategories', value)
    })
    var select = new TomSelect("#select-subCate");
    select.on('change',function (value){
        @this.set('selectedSubCategories', value)
    })
    var select = new TomSelect("#select-brand");
    select.on('change',function (value){
        @this.set('selectedBrands', value)
    })

    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    //     $('.js-example-basic-multiple').on('change',function(e){

    //         var data = $('.js-example-basic-multiple').select2('val')
    //         @this.set('cateModel', data)
    //     });
    //     $('.example-basic-multiple').select2();
    //     $('.example-basic-multiple').on('change',function(e){

    //         var data = $('.example-basic-multiple').select2('val')
    //         console.log(data);
    //         // @this.set('cateModel', data)
    //     });
    // });




</script>
@endpush