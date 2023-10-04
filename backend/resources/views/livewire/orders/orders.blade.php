@push('title')
Orders
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

    <x-table pageTitle='Orders Table' tableName="Orders Table" :$columnNamesArr :tableData='$orders' :$tableDataColumnNames
    :isEnum='true' :$enumColNames :$enumAttributes :$enumClasses>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>