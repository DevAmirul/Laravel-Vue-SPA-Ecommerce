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

    <x-table pageTitle='Tags Table' tableName="Tags Table" :columnNamesArr='$columnNamesArr' :tableData='$tags'
        :tableDataColumnNames='$tableDataColumnNames' :relation='false' relationName='' :hideBtn='true'
        :isBoolean='false' booleanColName='status' booleanAttributes='' booleanColNames=''>
    </x-table>
    <x-table pageTitle='Tags Table' tableName="Tags Table" :$columnNamesArr :tableData='$tags' :$tableDataColumnNames>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>