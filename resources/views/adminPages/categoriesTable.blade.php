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
<x-table tableName="Categories Table">
    <x-slot name="thead">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Position</th>
        <th scope="col">Age</th>
        <th scope="col">Start Date</th>
        </tr>
    </x-slot>
    <x-slot name="tbody">
        <tr>
        <th scope="row">1</th>
        <td>Brandon Jacob</td>
        <td>Designer</td>
        <td>28</td>
        <td>2016-05-25</td>
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