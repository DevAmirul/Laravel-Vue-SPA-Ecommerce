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
    <x-table tableName="Products Table" :columnNamesArr='$columnNamesArr' :tableData='$products' :tableDataColumnNames='$tableDataColumnNames' :image='true'>
        <X-slot >
            <div class="d-flex justify-content-between">
                <form class="mt-2">
                    <select wire:model='showDataPerPage' class="form-select" aria-label="Default select example">
                        <option value="10" selected>10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                    </select>
                </form>
                <nav class="navbar bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input wire:model.debounce='searchStr' class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-light disabled" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </nav>
            </div>
        </X-slot>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>