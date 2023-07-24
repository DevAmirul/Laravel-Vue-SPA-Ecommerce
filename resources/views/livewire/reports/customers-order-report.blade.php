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
        :columnNamesArr='$columnNamesArr' :showBtn='false' :tableData='$users'
        :tableDataColumnNames='$tableDataColumnNames'>
    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>