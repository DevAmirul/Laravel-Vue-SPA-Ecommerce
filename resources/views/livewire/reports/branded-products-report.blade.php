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
    <x-table pageTitle='Branded Products Report' tableName="Branded Products Report Table" :columnNamesArr='$columnNamesArr' :showBtn='false'
        :tableData='$brands' :tableDataColumnNames='$tableDataColumnNames'>
    </x-table>
<!-- End #main -->
<!-- ======= Footer ======= -->
@livewire('layouts.footer')
<!-- End Footer -->

</div>