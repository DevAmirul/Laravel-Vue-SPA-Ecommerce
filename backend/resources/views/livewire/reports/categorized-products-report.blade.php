@push('title')
Categorized Products Report
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
    <x-table pageTitle='Categorized Products Report' tableName="Categorized Products Report Table"
        :$columnNamesArr :showBtn='false' :tableData='$categoriesReports'
        :$tableDataColumnNames imageFolder='categories'>
    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>