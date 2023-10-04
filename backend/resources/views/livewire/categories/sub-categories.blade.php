@push('title')
Sub Categories
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

    <x-table addNewRoute='subCategories.create' pageTitle='Sub Categories Table' tableName="Sub Categories Table" :$columnNamesArr :tableData='$subCategories'
        :$tableDataColumnNames :isBoolean='true' :$booleanAttributes :$booleanColNames :$booleanClasses :relation='true'
        :$relationTableDataColumnNames :$relationName>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>