@push('title')
Branded Products Report
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
    <x-table pageTitle='Branded Products Report' tableName="Branded Products Report Table" :$columnNamesArr :showBtn='false'
        :tableData='$brandReports' :$tableDataColumnNames>
    </x-table>
<!-- End #main -->
<!-- ======= Footer ======= -->
@livewire('layouts.footer')
<!-- End Footer -->

</div>