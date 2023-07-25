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

    <x-table pageTitle='Orders Table' pageUrl='Orders' routeName='orders.show' tableName="Orders Table"
        :columnNamesArr='$columnNamesArr' :tableData='$orders' :tableDataColumnNames='$tableDataColumnNames'
        :image='false' :status='$status' statusColName='status' :relation='false' :hideBtn='false'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>