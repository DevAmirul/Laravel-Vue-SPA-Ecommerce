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
    <x-slot name="select">
        <form x-data="options" x-effect="getData(options.selectedDataOptions)" class="mt-2">
            <select x-model="options.selectedDataOptions" class="form-select" aria-label="Default select example">
                <option selected>10</option>
                <template x-for="dataOption in options.showDataOptions">
                    <option :value="dataOption" x-text="dataOption"></option>
                </template>
            </select>
        </form>
    </x-slot>


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

                    <tr id="tr1">
                        {{-- <td><img src="img_girl.jpg" alt="Product Image" width="100" height="100"></td> --}}
                        {{-- <td>okooooooo</td>
                        <td class="d-flex justify-content-end"><button class="btn btn-primary mx-1"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger mx-1"><i class="bi bi-archive"></i></button>
                        </td> --}}
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