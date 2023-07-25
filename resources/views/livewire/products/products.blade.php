@push('title')
Dashboard
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

    <x-table pageTitle='Products Table' pageUrl='products' routeName='products.show' tableName="Products Table"
        :columnNamesArr='$columnNamesArr' :tableData='$products' :tableDataColumnNames='$tableDataColumnNames'
        :image='true' statusColName='status' :hideBtn='false'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>