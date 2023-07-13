
@push('title')
Editors Create
@endpush

<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-form pageTitle='Settings' pageUrl='Settings' enctype="multipart/form-data">
        <x-form-input-field.general col="col-6" lable="Site name" name="site_name" type="text" wireModel='site_name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Site slogan" name="site_slogan" type="text" wireModel='site_slogan'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Site phone" name="phone" type="text" wireModel='phone'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Site phone 2" name="phone_2" type="text" wireModel='phone_2'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Site Email" name="email" type="email" wireModel='email'>
        </x-form-input-field.general>

        <x-form-input-field.general col="col-6" lable="Site address" name="address" type="address"
            wireModel='address'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Facebook" name="facebook" type="text" wireModel='facebook'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Youtube" name="youtube" type="text" wireModel='youtube'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Twitter" name="twitter" type="text" wireModel='twitter'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Instagram" name="instagram" type="text" wireModel='instagram'>
        </x-form-input-field.general>

        <x-form-input-field.file col="col-6" label="Upload site logo" name="site_logo" wireModel='site_logo'>
        </x-form-input-field.file>

        <x-form-input-field.submit color='primary' buttonName="Save Settings"></x-form-input-field.submit>



    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</div>