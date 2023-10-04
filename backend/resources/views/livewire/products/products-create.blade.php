@push('title')
Products Create
@endpush
@push('css')
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
    <x-form pageTitle='Products Create' action='create' enctype="multipart/form-data">

        <x-form-input-field.general col="col-6" lable="Product name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Slug" name="slug" type="text" wireModel='slug'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="SKU" name="sku" type="text" wireModel='sku'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Sale Price" name="sale_price" type="text" wireModel='sale_price'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Original Price" name="original_price" type="text"
            wireModel='original_price'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Qty In Stock" name="qty_in_stock" type="text"
            wireModel='qty_in_stock'>
        </x-form-input-field.general>

        <x-form-input-field.select-for-array col="col-6" wireModel='stock_status' defaultOption='Select Stock Status'
            :options='$stockStatusOption' name="stock_status">
        </x-form-input-field.select-for-array>

        <x-form-input-field.select-for-array col="col-6" wireModel='status' defaultOption='Select Status'
            :options='$statusOption' name="status">
        </x-form-input-field.select-for-array>

        <x-form-input-field.select col='col-3' defaultOption='Select Section' :options='$sections'
            wireModel='selectedSection' colName='name' name="section_id">
        </x-form-input-field.select>
        <x-form-input-field.select col='col-3' defaultOption='Select Category' :options='$categories'
            wireModel='selectedCategory' colName='name' name="category_id">
        </x-form-input-field.select>
        <x-form-input-field.select col='col-3' defaultOption='Select Sub Category' :options='$subCategories'
            wireModel='sub_category_id' colName='name' name="sub_category_id">
        </x-form-input-field.select>
        <x-form-input-field.select col='col-3' defaultOption='Select Brand' :options='$brands' wireModel='brand_id'
            colName='name' name="brand_id">
        </x-form-input-field.select>

        <x-form-input-field.text-area col="" lable="Description" name="description" type="text" wireModel='description'>
        </x-form-input-field.text-area>

        <div wire:ignore>
            <select id="select-tag" class="form-select" name="state[]" multiple placeholder="Select tags...(optional)"
                autocomplete="off">
                @foreach ($allTags as $tag)
                <option value="{{ $tag->keyword }}">{{ $tag->keyword }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            @error( 'selectedTags' ) <span class=" error fw-light text-danger">{{ $message }}</span> @enderror
        </div>

        @foreach ($allAttributes as $attribute)
        <div wire:ignore>
            <select id="select-{{ $attribute->name }}" class="form-select" name="state[]" multiple
                placeholder="Select {{ $attribute->name }}...(optional)" autocomplete="off">
                @foreach ($attribute->attributeOption as $option)
                <option
                    value="{{ $option->value }}">{{ $option->value }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            @error( 'selectedSize' ) <span class=" error fw-light text-danger">{{ $message }}</span>
            @enderror
        </div>
        @endforeach

        <x-form-input-field.file col="col-6" label="Upload Image" name="image" wireModel='image'>
        </x-form-input-field.file>

        <x-form-input-field.file col="col-6" name='gallery' label="Upload Gallery" wireModel='gallery'
            multiple="multiple">
        </x-form-input-field.file>

        <div class="form-group col-12" wire:ignore>
            <textarea name="edit" class="form-control" id="editor" rows="3"></textarea>
        </div>
        <div>
            @error( 'specification' ) <span class=" error fw-light text-danger">{{ $message }}</span> @enderror
        </div>

        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    new TomSelect("#select-tag",{
        plugins: ['remove_button'],
        create: true,
        onChange: function (value){
        @this.set('selectedTags', value)
        }
    });

    for (const attribute in @js($allAttributes)) {
        new TomSelect(`#select-${@js($allAttributes)[attribute].name}`,{
            plugins: ['remove_button'],
            create: true,
            onChange: function (value){
                @this.set(`selectedProductAttribute.${@js($allAttributes)[attribute].id}`, value)
            }
        });
    }

    ClassicEditor
        .create( document.querySelector( '#editor' ),{
        } )
        .then( editor => {
            editor.model.document.on('change:data', () => {
                @this.set('specification', editor.getData())
            });
        })
        .catch( error => {
            console.error( error );
        } );

</script>
@endpush