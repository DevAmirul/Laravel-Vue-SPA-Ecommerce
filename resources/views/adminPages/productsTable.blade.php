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
    <x-slot name="tbody">
        @foreach ($products as $product)
        <tr>
            <td><img src="img_girl.jpg" alt="Product Image" width="100" height="100"></td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->stock_status }}</td>
            <td>{{ $product->qty_in_stock }}</td>
            <td>{{ $product->sub_category_id }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount_price }}</td>
            <td>{{ $product->offer_price }}</td>
            <td class="d-flex justify-content-end"><button class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-danger mx-1"><i class="bi bi-archive"></i></button></td>
        </tr>
        @endforeach
    </x-slot>
</x-table>
<!-- End #main -->
<!-- ======= Footer ======= -->
<x-layouts.footer></x-layouts.footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@endsection