@push('title')
Sub Categories
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

    <x-table pageTitle='SubCategories Table' pageUrl='sub-categories' tableName="SubCategories Table"
        :columnNamesArr='$columnNamesArr' :tableData='$subCategories' :tableDataColumnNames='$tableDataColumnNames'
        :relation='true' relationName='category' :hideBtn='false' booleanColName='status'
        :booleanAttributes='$booleanAttributes' :booleanColNames='$booleanColNames'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>