@push('title')
Coupons
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

    <!-- End Page Title -->

    <x-table addNewRoute='settings.coupons.create' pageTitle='Coupons Table' tableName="Coupons Table" :$columnNamesArr :tableData='$coupons'
        :$tableDataColumnNames :isBoolean='true' :$booleanAttributes :$booleanColNames :$booleanClasses>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>