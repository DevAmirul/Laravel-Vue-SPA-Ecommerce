@push('title')
Categories
@endpush
<div>
    <!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->
    <x-table pageTitle='Coupons Orders Report' tableName="Coupons Orders Report Table"
        :columnNamesArr='$columnNamesArr' :tableData='$coupons'
        :tableDataColumnNames='$tableDataColumnNames'
        :showBtn='false' >
    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>