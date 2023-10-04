@push('title')
Attributes Create
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

    <x-form pageTitle='Attribute Create' action='create'>
        <x-form-input-field.general col="col-8" lable="Attribute name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>

        <div class="col-1">
            <button wire:click.prevent='increaseInputField' type="button" class="btn btn-outline-primary"><i
                    class="bi bi-plus-circle"></i></button>
        </div>
        <div class="col-1">
            <button wire:click.prevent='decreaseInputField' type="button" class="btn btn-outline-primary"><i
                    class="bi bi-dash-circle"></i></button>
        </div>

        @for ($i = 1; $i <= $plusButton; $i ++) <x-form-input-field.general col="col-sm-4" lable="Attribute value"
            name="value" type="text" wireModel='values.{{ $i }}'>
            </x-form-input-field.general>
            @endfor

            <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>