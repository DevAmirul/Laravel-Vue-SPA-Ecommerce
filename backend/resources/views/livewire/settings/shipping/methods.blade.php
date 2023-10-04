@push('title')
Categories
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

    <x-table addNewRoute='settings.shippingMethods.create' pageTitle='Shipping methods Table' tableName="Shipping methods Table" :$columnNamesArr :tableData='$methods' :$tableDataColumnNames>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>