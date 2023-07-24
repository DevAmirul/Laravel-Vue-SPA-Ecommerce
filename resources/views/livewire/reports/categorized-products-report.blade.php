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
    <x-table pageTitle='Categorized Products Report' tableName="Categorized Products Report Table"
        :columnNamesArr='$columnNamesArr' :showBtn='false' :tableData='$categories'
        :tableDataColumnNames='$tableDataColumnNames'>
    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>