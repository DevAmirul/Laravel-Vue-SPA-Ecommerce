@push('title')
Sub Categories
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->

    <main id="main" class="main">
        @php
        $pageTitle = 'Order Details';
        $pageUrl = 'Order / Details';
        @endphp
        <x-layouts.page-title :pageTitle='$pageTitle' :pageUrl='$pageUrl'></x-layouts.page-title>
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
                                                #{{ $ordersId }}</strong>
                                        </p>
                                    </div>
                                    <div class="col-xl-3 float-end">
                                        <a href="{{ route('orders.pdf', ['id' => $ordersId]) }}" class="btn btn-light text-capitalize border-0"
                                            data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i>
                                            Invoice PDF</a>
                                    </div>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                            <p class="pt-0">{{ config('app.name') }}</p>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-xl-8">
                                            <ul class="list-unstyled">
                                                <li class="text-muted"><span class="fw-bold">To : </span><span
                                                        style="color:#5d9fc5 ;">{{ $name }}</span>
                                                </li>
                                                <li class="text-muted"><i class="fas fa-phone"></i><span class="fw-bold">Phone : </span>
                                                    {{ $phone }}</li>
                                                <li class="text-muted"><span class="fw-bold">City: </span>{{ $city }}</li>
                                                <li class="text-muted"><span class="fw-bold">State : </span>{{ $state }}</li>
                                                <li class="text-muted"><span class="fw-bold">Address : </span>{{ $address_1 }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4">
                                            <p class="text-muted">Invoice</p>
                                            <ul class="list-unstyled">
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    <span class="fw-bold">ID:</span>#{{ $ordersId }}
                                                </li>
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    <span class="fw-bold">Creation Date:
                                                    </span>{{ $created_at }}
                                                </li>
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    <span class="me-1 fw-bold">Order Status:</span><span
                                                        class="badge bg-warning text-black fw-bold">
                                                        @if ($status == 0)
                                                        <td>Canceled
                                                        </td>
                                                        @elseif ($status == 1)
                                                        <td>Delivered
                                                        </td>
                                                        @elseif ($status == 2)
                                                        <td>Approved
                                                        </td>
                                                        @elseif ($status == 3)
                                                        <td>Pending
                                                        </td>
                                                        @endif
                                                    </span>
                                                </li>
                                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                                    <span class="me-1 fw-bold">Payment Status:</span><span class="badge bg-warning text-black fw-bold">
                                                        @if ($status == 0)
                                                        <td>Canceled
                                                        </td>
                                                        @elseif ($status == 1)
                                                        <td>Delivered
                                                        </td>
                                                        @elseif ($status == 2)
                                                        <td>Approved
                                                        </td>
                                                        @elseif ($status == 3)
                                                        <td>Pending
                                                        </td>
                                                        @endif
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row my-2 mx-1 justify-content-center">
                                        <table class="table table-striped table-borderless">
                                            <thead style="background-color:#84B0CA ;" class="text-white">
                                                <tr>
                                                    <th scope="col">#Id</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Discount Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ $key+1 }}</th>
                                                    <td>{{ $item[1] }}</td>
                                                    <td>{{ $item[2] }}</td>
                                                    <td>{{ $item[3] }}</td>
                                                    <td>{{ $item[3] - $item[4] }}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="col-6 mt-3">
                                                <form wire:submit.prevent='save'>
                                                    <select wire:model='status' class="form-select"
                                                        aria-label="Default select example">
                                                        <option value="0">Canceled</option>
                                                        <option value="1">Delivered</option>
                                                        <option value="2">Approved</option>
                                                        <option value="3">Pending</option>
                                                    </select>
                                                    <x-form-input-field.submit color='primary' buttonName="Save">
                                                    </x-form-input-field.submit>
                                                </form>
                                            </div>

                                        </div>
                                        <div class="col-xl-3">
                                            <ul class="list-unstyled">
                                                <li class="text-muted ms-3 mt-2"><span
                                                        class="fw-bold me-4">Discount</span>${{ $discount }}
                                                </li>
                                                <li class="text-muted ms-3"><span
                                                        class="fw-bold me-4">SubTotal</span>${{ $subtotal }}
                                                </li>

                                            </ul>
                                            <p class="text-black float-start mx-3"><span class="fw-bold me-4">Total : </span><span style="font-size: 25px;">${{ $total }}</span></p>
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

    </main>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>