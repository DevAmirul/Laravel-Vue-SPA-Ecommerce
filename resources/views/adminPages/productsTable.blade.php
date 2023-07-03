@extends('layouts.mainApp')
@push('title')
Dashboard
@endpush
@section('section')
<!-- ======= Header ======= -->
<x-layouts.header></x-layouts.header>
<!-- End Header -->
<!-- ======= Sidebar ======= -->
<x-layouts.sidebar></x-layouts.sidebar>
<!-- End Sidebar-->

<x-table tableName="Product Table">
    <x-slot name="thead">
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">SKU</th>
            <th scope="col">Stock Status</th>
            <th scope="col">Qty in Stock</th>
            <th scope="col">Sub Category</th>
            <th scope="col">Price</th>
            <th scope="col">Discount Price</th>
            <th scope="col">Offer Price</th>
            <th scope="col">Action</th>
        </tr>
    </x-slot>

</x-table>

<!-- End #main -->
<!-- ======= Footer ======= -->
<x-layouts.footer></x-layouts.footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@endsection