@push('title')
Brands Create
@endpush

<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-form pageTitle='Attribute Create' pageUrl='Attribute / Create'>
        <x-form-input-field.general col="col-6" lable="Attribute name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>

        <div class="col-6">
            <button wire:click.prevent='extendInputField' type="button" class="btn btn-outline-primary"><i
                    class="bi bi-plus-circle"></i></button>
        </div>

        @for ($i = 1; $i <= $plusButton; $i ++)
        <x-form-input-field.general col="col-sm-4" lable="Attribute value" name="value" type="text" wireModel='value.{{ $i }}'>
        </x-form-input-field.general>
        @endfor
        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</div>