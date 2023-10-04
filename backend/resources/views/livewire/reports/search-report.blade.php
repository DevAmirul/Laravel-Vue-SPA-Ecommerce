@push('title')
Search Report
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
    <x-table pageTitle='Sales Report' tableName="Sales Report Table" :$columnNamesArr :showBtn='false' :tableData='$keywordReports' :$tableDataColumnNames>
    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>