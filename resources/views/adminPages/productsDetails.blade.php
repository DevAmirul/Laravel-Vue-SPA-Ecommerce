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
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container mt-6 mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-xl-7">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<x-layouts.footer></x-layouts.footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@endsection
