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
    <x-form pageTitle='Shipping Methods Create' pageUrl='Shipping-Methods / Create'>
        <x-form-input-field.general col="col-6" lable="Shipping methods name" name="name" type="text"
            wireModel='name'>
        </x-form-input-field.general>

        <x-form-input-field.general col="col-6" lable="Shipping methods cost" name="cost" type="text"
            wireModel='cost'>
        </x-form-input-field.general>

        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>