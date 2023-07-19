@push('title')
Coupons
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->

    <x-table pageTitle='Coupons Table' pageUrl='Coupons' tableName="Coupons Table" :columnNamesArr='$columnNamesArr'
        :tableData='$coupons' :tableDataColumnNames='$tableDataColumnNames' :relation='false' relationName=''
        :isBoolean='true' :hideBtn='false' booleanColName='status' :booleanAttributes='$booleanAttributes'
        :booleanColNames='$booleanColNames'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>