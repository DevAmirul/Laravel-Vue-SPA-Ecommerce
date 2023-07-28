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
    <x-table pageTitle='Customers Order Report' tableName="Customers Order Report Table"
        :$columnNamesArr :showBtn='false' :tableData='$usersReports'
        :$tableDataColumnNames :filterStatus='true' :filterGroupBy='true' :filterDate='true' :$orderStatus :$groupBy :$startDate :$expireDate>
    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>