@push('title')
Editors
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

    <x-table addNewRoute='register' pageTitle='Editors Table' tableName="Editors Table" :$columnNamesArr :tableData='$editors'
        :$tableDataColumnNames :isBoolean='true' :$booleanAttributes :$booleanColNames :$booleanClasses>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>