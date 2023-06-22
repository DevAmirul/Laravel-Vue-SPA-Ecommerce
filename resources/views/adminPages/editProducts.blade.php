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
<main id="main" class="main">
    <x-layouts.page-title></x-layouts.page-title>
    <!-- End Page Title -->
    <x-form>

        <x-form-input-field.general col="col-6" lable="Enter Name" name="name" type="text"></x-form-input-field.general>

        <x-form-input-field.general col="col-6" lable="Enter Email" name="email" type="email">
            </x-form-input-field.te>

            <x-form-input-field.general col="col-6" lable="Enter Phone" name="phone" type="text">
            </x-form-input-field.general>

            <x-form-input-field.general col="col-6" lable="Enter Address" name="address" type="text">
            </x-form-input-field.general>

            <x-form-input-field.select col="col-6" name="select">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </x-form-input-field.select>

            <x-form-input-field.text-area col="col-6" lable="Enter message" name="area"></x-form-input-field.text-area>

            <x-form-input-field.general col="col-6" lable="Enter password" name="password" type="password">
            </x-form-input-field.general>

            <x-form-input-field.general col="col-6" lable="Enter confirm password" name="confirmPassword"
                type="password">
            </x-form-input-field.general>

            <x-form-input-field.file col="col-6" label="Upload Image" name="name"></x-form-input-field.file>

            <x-form-input-field.submit buttonName="submit"></x-form-input-field.submit>
    </x-form>
</main>
<!-- ======= Footer ======= -->
<x-layouts.footer></x-layouts.footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@endsection