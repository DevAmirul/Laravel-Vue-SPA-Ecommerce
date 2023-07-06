@push('title')
Dashboard
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->
    @php
        $columnNamesArr = ['Image','Name','SKU','Stock Status','Qty in Stock','Sub Category','Price','Discount Price','Offer Price','Action'];

        $tableDataColumnNames = ['image','title','sku','stock_status','qty_in_stock','sub_category_id','price','discount_price','offer_price']
    @endphp

    <!-- End Page Title -->

    <x-table pageTitle='Products Table' pageUrl='products' tableName="Products Table" :columnNamesArr='$columnNamesArr' :tableData='$products' :tableDataColumnNames='$tableDataColumnNames' :image='true'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>