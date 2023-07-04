{{-- @extends('layouts.mainApp') --}}
@push('title')
Dashboard
@endpush
@section('section')
<!-- ======= Header ======= -->
<x-layouts.header></x-layouts.header>
<!-- End Header -->
<!-- ======= Sidebar ======= -->
<x-layouts.sidebar></x-layouts.sidebar>
<!-- End Sidebar-->
<main id="main" class="main">
    <x-layouts.page-title></x-layouts.page-title>
    <!-- End Page Title -->
    <x-form>

        <x-form-input-field.general col="col-6" lable="Product title" name="name" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Slug" name="slug" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="SKU" name="sku" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Description" name="description" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Short Description" name="shortDescription" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Information" name="information" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Price" name="price" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Discount Price" name="discountPrice" type="text">
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="offer Price" name="offerPrice" type="text">
        </x-form-input-field.general>


        {{-- <div x-data="fetchSubCategories" x-effect="getCategory(value.selectedSectionValue)" class="col-6">
            <select id="select" class="form-select" aria-label="Default select example" name="selectSection" x-model="value.selectedSectionValue">
                <option value="0">Select Section</option>
                <template x-for="section in getSections()">
                    <option :value="section[1]['id']" x-text="section[1]['name']"></option>
                </template>
            </select>
        </div> --}}

        <div x-data="fetchSubCategories" class="col-6">
            <select id="select" class="form-select" aria-label="Default select example" name="selectSection"
                x-model="value.selectedSectionValue">
                <option value="0">Select Section</option>
                <template x-for="section in getSections()">
                    <option :value="section[1]['id']" x-text="section[1]['name']"></option>
                </template>
            </select>
        </div>

        <x-form-input-field.general col="col-6" lable="Qty In Stock" name="qtyInStock" type="text">
        </x-form-input-field.general>

        {{-- <div x-data="fetchSubCategories" class="col-6">
            <select id="select" class="form-select" aria-label="Default select example" name="selectSection"
                x-model="value.selectedSectionValue">
                <option value="0">Select Section</option>
                <template x-for="section in getSections()">
                    <option :value="section[1]['id']" x-text="section[1]['name']"></option>
                </template>
            </select>
        </div> --}}
        <div x-data  >
            <div ><h1 x-text="$store.state.options" ></h1></div>
        </div>



        <x-form-input-field.general col="col-6" lable="Stock Status" name="stockStatus" type="text">
        </x-form-input-field.general>


        {{-- <div x-data="fetchSubCategories" class="col-6">
            <select id="select" class="form-select" aria-label="Default select example" name="selectCategory">
                <option value="0">Select Sub Category</option>
                <template x-for="color in getSections()">
                    <option x-text="color">ok</option>
                </template>
            </select>
        </div> --}}


        <x-form-input-field.file col="col-6" label="Upload Image" name="image"></x-form-input-field.file>
        <x-form-input-field.file col="col-6" label="Upload Images" name="images"></x-form-input-field.file>

        <x-form-input-field.submit buttonName="Save"></x-form-input-field.submit>
    </x-form>
</main>
<!-- ======= Footer ======= -->
<x-layouts.footer></x-layouts.footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@endsection