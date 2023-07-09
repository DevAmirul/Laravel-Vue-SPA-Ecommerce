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
                            <div class="card">
                                <div class="card-body p-5">
                                    <h2>
                                        Hey Anna,
                                    </h2>
                                    <p class="fs-sm">
                                        This is the receipt for a payment of <strong>$312.00</strong> (USD) you made to
                                        Spacial Themes.
                                    </p>

                                    <div class="border-top border-gray-200 pt-4 mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-muted mb-2">Payment No.</div>
                                                <strong>#88305</strong>
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                <div class="text-muted mb-2">Payment Date</div>
                                                <strong>Feb/09/20</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-top border-gray-200 mt-4 py-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-muted mb-2">Client</div>
                                                <strong>
                                                    John McClane
                                                </strong>
                                                <p class="fs-sm">
                                                    989 5th Avenue, New York, 55832
                                                    <br>
                                                    <a href="#!" class="text-purple">john@email.com
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                <div class="text-muted mb-2">Payment To</div>
                                                <strong>
                                                    Themes LLC
                                                </strong>
                                                <p class="fs-sm">
                                                    9th Avenue, San Francisco 99383
                                                    <br>
                                                    <a href="#!" class="text-purple">themes@email.com
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table border-bottom border-gray-200 mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">
                                                    Description</th>
                                                <th scope="col"
                                                    class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Amount
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-0">Theme customization</td>
                                                <td class="text-end px-0">$60.00</td>
                                            </tr>
                                            <tr>
                                                <td class="px-0">Website design</td>
                                                <td class="text-end px-0">$80.00</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="mt-5">
                                        <div class="d-flex justify-content-end">
                                            <p class="text-muted me-3">Subtotal:</p>
                                            <span>$390.00</span>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <p class="text-muted me-3">Discount:</p>
                                            <span>-$40.00</span>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <h5 class="me-3">Total:</h5>
                                            <h5 class="text-success">$399.99 USD</h5>
                                        </div>
                                    </div>
                                </div>
                                <a href="#!"
                                    class="btn btn-dark btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light">
                                    <span class="svg-icon text-white me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512"
                                            viewBox="0 0 512 512">
                                            <title>ionicons-v5-g</title>
                                            <path d="M336,208V113a80,80,0,0,0-160,0v95"
                                                style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px">
                                            </path>
                                            <rect x="96" y="208" width="320" height="272" rx="48" ry="48"
                                                style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px">
                                            </rect>
                                        </svg>
                                    </span>
                                    Pay Now
                                </a>
                            </div>
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