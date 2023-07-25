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

    <x-table pageTitle='Editors Table' pageUrl='Editors' tableName="Editors Table" :columnNamesArr='$columnNamesArr'
        :tableData='$editors' :tableDataColumnNames='$tableDataColumnNames' :isBoolean='true'
        :booleanAttributes='$booleanAttributes' :booleanColNames='$booleanColNames' :booleanClass='$booleanClass'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>