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

    <x-table pageTitle='Offers Table' pageUrl='Offers' tableName="Offers Table" :columnNamesArr='$columnNamesArr'
        :tableData='$offers' :tableDataColumnNames='$tableDataColumnNames' :relation='false' relationName=''
        :hideBtn='false' :isBoolean='true' booleanColName='status' :booleanAttributes='$booleanAttributes'
        :booleanColNames='$booleanColNames'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>
