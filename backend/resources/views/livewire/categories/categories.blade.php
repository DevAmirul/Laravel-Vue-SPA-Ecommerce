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

    <x-table addNewRoute='categories.create' pageTitle='Categories Table' tableName="Categories Table"
        :$columnNamesArr :tableData='$categories' :$tableDataColumnNames
        :isBoolean='true' :$booleanAttributes :$booleanColNames :$booleanClasses
        :relation='true' :$relationTableDataColumnNames :$relationName imageFolder='categories'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>