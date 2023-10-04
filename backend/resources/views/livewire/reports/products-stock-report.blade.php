@push('title')
Products Stock Report
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
    <x-table pageTitle='Products Stock Report' tableName="Products Stock Report Table" :$columnNamesArr :showBtn='false'
        :tableData='$productStockReports' :$tableDataColumnNames :isBoolean='true' :$booleanAttributes :$booleanColNames
        :$booleanClasses imageFolder='products'>

        <form class="mt-2 d-flex gap-2">
            <div class="col-4">
                <select wire:model='stockAvailability' class="form-select" aria-label="Default select example">
                    <option value="null" disabled selected>Stock Availability</option>
                    <option value="1">In Stock</option>
                    <option value="2">Out Of Stock</option>
                </select>
            </div>
            <div class="col-4 d-flex gap-2">
                <x-form-input-field.general col="col-10" lable="Quantity Above" name="quantityAbove" type="number"
                    wireModel='quantityAbove'>
                </x-form-input-field.general>
                <x-form-input-field.general col="col-10" lable="Quantity Below" name="quantityBelow" type="number"
                    wireModel='quantityBelow'>
                </x-form-input-field.general>

            </div>

        </form>

    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>