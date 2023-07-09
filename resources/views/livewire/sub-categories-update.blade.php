@push('title')
Category Create
@endpush

<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-form pageTitle='Category Create' pageUrl='Category / Create'>
        <x-form-input-field.general col="col-6" lable="Category name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.select col='col-6' defaultOption='Select Category' :options='$categories'
            wireModel='category_id' colName='name' name="category_id">
        </x-form-input-field.select>
        <x-form-input-field.general col="col-12" lable="Category Slug" name="slug" type="text" wireModel='slug'>
        </x-form-input-field.general>

        <x-form-input-field.submit buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</div>