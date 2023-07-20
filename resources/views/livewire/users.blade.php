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

    <x-table pageTitle='Users Table' pageUrl='Home / Users' tableName="Users Table" :columnNamesArr='$columnNamesArr'
        :tableData='$users' :tableDataColumnNames='$tableDataColumnNames' :showBtn='false' :isEnum='true' :enumColNames='$enumColNames'
        :enumAttributes='$enumAttributes' :enumClass='$enumClass'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
    
</div>