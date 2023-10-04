@push('title')
Brands
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

    <x-table addNewRoute='brands.create' pageTitle='Brands Table' tableName="Brands Table" :$columnNamesArr :tableData='$brands' :$tableDataColumnNames
        :isBoolean='true' :$booleanAttributes :$booleanColNames :$booleanClasses imageFolder='brands'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>