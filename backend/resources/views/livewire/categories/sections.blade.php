@push('title')
Sections
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

    <x-table addNewRoute='sections.create' pageTitle='Sections Table' tableName="Sections Table" :$columnNamesArr :tableData='$sections' :$tableDataColumnNames :isBoolean='true' :$booleanAttributes :$booleanColNames :$booleanClasses imageFolder='sections'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>