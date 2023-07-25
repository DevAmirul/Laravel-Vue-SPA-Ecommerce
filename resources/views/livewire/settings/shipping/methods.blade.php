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

    <x-table pageTitle='Shipping methods Table' pageUrl='Shipping methods' tableName="Shipping methods Table"
        :columnNamesArr='$columnNamesArr' :tableData='$methods' :tableDataColumnNames='$tableDataColumnNames'
        :relation='false' relationName='' :hideBtn='false' :isBoolean='false' booleanColName='' booleanAttributes=''
        booleanColNames=''>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>