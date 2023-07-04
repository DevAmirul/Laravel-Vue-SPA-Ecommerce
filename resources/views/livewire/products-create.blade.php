@push('title')
Product Create
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-form pageTitle='Product Add' pageUrl='products / create'>
        <x-form-input-field.general col="col-6" lable="Product title" name="name" type="text" wireModel='title'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Slug" name="slug" type="text" wireModel='slug'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="SKU" name="sku" type="text" wireModel='sku'>
        </x-form-input-field.general>

        <x-form-input-field.general col="col-6" lable="Price" name="price" type="text" wireModel='price'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Discount Price" name="discountPrice" type="text"
            wireModel='discount_price'>
        </x-form-input-field.general>


        <x-form-input-field.general col="col-6" lable="Qty In Stock" name="qtyInStock" type="text"
            wireModel='qty_in_stock'>
        </x-form-input-field.general>
        <x-form-input-field.select col='col-6' option='Section' :options='$sections' wireModel='selectedSection'>
        </x-form-input-field.select>

        <x-form-input-field.general col="col-6" lable="Stock Status" name="stockStatus" type="text"
            wireModel='stock_status'>
        </x-form-input-field.general>
        <x-form-input-field.select col='col-6' option='Category' :options='$categories' wireModel='selectedCategory'>
        </x-form-input-field.select>
        <x-form-input-field.select col='col-6' option='Sub Category' :options='$subCategories'
            wireModel='selectedSubCategory'>
        </x-form-input-field.select>
        <x-form-input-field.text-area col="col-6" lable="Description" name="description" type="text"
            wireModel='description'>
        </x-form-input-field.text-area>

        <x-form-input-field.text-area col="col-6" lable="Short Description" name="shortDescription" type="text"
            wireModel='short_description'>
        </x-form-input-field.text-area>
        {{-- <x-form-input-field.text-area col="col-6" lable="Information" name="information" type="text"
            wireModel='information'>
        </x-form-input-field.text-area> --}}

        <!-- Quill Editor Default -->
        <div class="col-6 pb-5 mb-5">
            <label for="formFileSm" class="form-label">Product Information Here</label>
            <div class="quill-editor-default" wire:model='information'>
            </div>
        </div>
        <!-- Quill Editor end -->



        <x-form-input-field.file col="col-6" label="Upload Image" name="image" wireModel='image'>
        </x-form-input-field.file>
        <x-form-input-field.file col="col-6" label="Upload Images" name="images" wireModel='all_images'>
        </x-form-input-field.file>



        <x-form-input-field.submit buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</div>