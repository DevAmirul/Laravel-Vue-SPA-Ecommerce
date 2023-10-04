@push('title')
Offers Update
@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
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

    <x-form pageTitle='Offers Update' action='update'>
        <x-form-input-field.general col="col-6" lable="Offers name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Offers slug" name="slug" type="text" wireModel='slug'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Offers title" name="title" type="text" wireModel='title'>
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
        <x-form-input-field.file col="col-6" label="Upload Image" name="image" wireModel='image'>
        </x-form-input-field.file>

        <div class="col-6"><input wire:model='start_date' class="form-control" id="start_date" type="text"
                name="start_date" placeholder="Pick start Date" aria-label="Start Date">
            @error( 'start_date' ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror</div>

        <div class="col-6"><input wire:model='expire_date' class="form-control" id="expire_date" type="text"
                name="expire_date" placeholder="Pick expire Date" aria-label="Start Date">
            @error( 'expire_date' ) <span class="error fw-light text-danger">{{ $message }}</span> @enderror
        </div>

        <div wire:ignore>
            <select id="select-cate" class="form-select" name="state[]" multiple
                placeholder="Select categories...(optional)" autocomplete="off">
                @foreach ($categories as $category)
                <option @selected(str_contains($category_id, $category->id))
                    value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div wire:ignore>
            <select id="select-subCate" class="form-select" name="state[]" multiple
                placeholder="Select sub categories...(optional)" autocomplete="off">
                @foreach ($subCategories as $subCategory)
                <option @selected(str_contains($subCategory_id, $subCategory->id)) value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div wire:ignore>
            <select id="select-brand" class="form-select" name="state[]" multiple
                placeholder="Select brands...(optional)" autocomplete="off">
                @foreach ($brands as $brand)
                <option @selected(str_contains($brand_id, $brand->id)) value="{{ $brand->id }}">{{ $brand->name }}</option>
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
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect("#select-cate",{
        plugins: ['remove_button'],
        create: true,
        onChange: function (value){
            @this.set('selectedCategories', value)
        }
    });
    new TomSelect("#select-subCate",{
        plugins: ['remove_button'],
        create: true,
        onChange: function (value){
        @this.set('selectedSubCategories', value)
        }
    });
    new TomSelect("#select-brand",{
        plugins: ['remove_button'],
        create: true,
        onChange: function (value){
        @this.set('selectedBrands', value)
        }
    });

    flatpickr("#start_date", {
    dateFormat: "Y-m-d H:i:s",
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    });
    flatpickr("#expire_date", {
    dateFormat: "Y-m-d H:i:s",
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    });

</script>
@endpush