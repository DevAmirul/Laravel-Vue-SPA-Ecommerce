@push('title')
Categories
@endpush
<div>
    <!-- ======= Header ======= -->
    @livewire('layouts.header')
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->

    <x-table pageTitle='Users Table' tableName="Users Table" :$columnNamesArr
        :tableData='$users' :$tableDataColumnNames :showBtn='false' :isEnum='true' :$enumColNames :$enumAttributes :$enumClasses>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>