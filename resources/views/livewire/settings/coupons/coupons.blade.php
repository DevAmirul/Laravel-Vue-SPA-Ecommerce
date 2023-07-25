@push('title')
Coupons
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

    <!-- End Page Title -->

    <x-table pageTitle='Coupons Table' pageUrl='Coupons' tableName="Coupons Table" :columnNamesArr='$columnNamesArr'
        :tableData='$coupons' :tableDataColumnNames='$tableDataColumnNames' :relation='false' relationName=''
        :isBoolean='true' :hideBtn='false' booleanColName='status' :booleanAttributes='$booleanAttributes'
        :booleanColNames='$booleanColNames'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
    
</div>