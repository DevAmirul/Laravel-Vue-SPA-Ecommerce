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

    <x-table pageTitle='Categories Table' pageUrl='Categories' tableName="Categories Table"
        :columnNamesArr='$columnNamesArr' :tableData='$categories' :tableDataColumnNames='$tableDataColumnNames'
        :relation='true' relationName='section' :isBoolean='true' :hideBtn='false'
        booleanColName='status' :booleanAttributes='$booleanAttributes' :booleanColNames='$booleanColNames'
        >
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>