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

    <x-table pageTitle='Orders Table' tableName="Orders Table" :$columnNamesArr :tableData='$orders' :$tableDataColumnNames>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>