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

    <x-table pageTitle='Contact Us Table' pageUrl='Home / Contacts' tableName="Contact Us Table" :columnNamesArr='$columnNamesArr'
        :tableData='$contacts' :tableDataColumnNames='$tableDataColumnNames'
        :isBoolean='true' :booleanAttributes='$booleanAttributes'
        :booleanColNames='$booleanColNames' :$booleanClass >
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>