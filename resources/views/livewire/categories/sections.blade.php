@push('title')
Sections
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

    <x-table pageTitle='Sections Table' pageUrl='Sections' tableName="Sections Table"
        :columnNamesArr='$columnNamesArr' :tableData='$sections' :tableDataColumnNames='$tableDataColumnNames'
        :relation='false' :hideBtn='false'
        booleanColName='status' :booleanAttributes='$booleanAttributes' :booleanColNames='$booleanColNames'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>