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
    <main id="main" class="main">
        <x-layouts.page-title pageUrl='Orders / Update' pageTitle='Orders / Update'></x-layouts.page-title>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mb-5 mt-3">
                                <div class="row d-flex align-items-baseline">
                                    <div class="col-xl-9">
                                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID:
                                                #123-123</strong>
                                        </p>
                                    </div>
                                    <div class="col-xl-3 float-end">
                                        <a class="btn btn-light text-capitalize border-0"
                                            data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i>
                                            Print</a>
                                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                                class="far fa-file-pdf text-danger"></i> Export</a>
                                    </div>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                            <p class="pt-0">MDBootstrap.com</p>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-xl-8">
                                            <ul class="list-unstyled">
                                                <li class="text-muted">To: <span style="color:#5d9fc5 ;">John
                                                        Lorem</span>
                                                </li>
                                                <li class="text-muted">Street, City</li>
                                                <li class="text-muted">State, Country</li>
                                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4">
                                            <p class="text-muted">Invoice</p>
                                            <ul class="list-unstyled">
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    <span class="fw-bold">ID:</span>#123-456
                                                </li>
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    <span class="fw-bold">Creation Date: </span>Jun 23,2021
                                                </li>
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    <span class="me-1 fw-bold">Status:</span><span
                                                        class="badge bg-warning text-black fw-bold">
                                                        Unpaid</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row my-2 mx-1 justify-content-center">
                                        <table class="table table-striped table-borderless">
                                            <thead style="background-color:#84B0CA ;" class="text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Unit Price</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Pro Package</td>
                                                    <td>4</td>
                                                    <td>$200</td>
                                                    <td>$800</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Web hosting</td>
                                                    <td>1</td>
                                                    <td>$10</td>
                                                    <td>$10</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Consulting</td>
                                                    <td>1 year</td>
                                                    <td>$300</td>
                                                    <td>$300</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <p class="ms-3">Add additional notes and payment information</p>

                                        </div>
                                        <div class="col-xl-3">
                                            <ul class="list-unstyled">
                                                <li class="text-muted ms-3"><span
                                                        class="text-black me-4">SubTotal</span>$1110</li>
                                                <li class="text-muted ms-3 mt-2"><span
                                                        class="text-black me-4">Tax(15%)</span>$111</li>
                                            </ul>
                                            <p class="text-black float-start"><span class="text-black me-3"> Total
                                                    Amount</span><span style="font-size: 25px;">$1221</span></p>
                                        </div>
                                    </div>
                                    <hr>
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
</div>