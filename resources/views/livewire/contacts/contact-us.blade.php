@push('title')
Sub Categories
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-table pageTitle='Contact Us Table' pageUrl='Home / Contacts' tableName="Contact Us Table" :columnNamesArr='$columnNamesArr'
        :tableData='$contacts' :tableDataColumnNames='$tableDataColumnNames'
        :isBoolean='true' :booleanAttributes='$booleanAttributes'
        :booleanColNames='$booleanColNames' :$booleanClass >
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>