@push('title')
Orders Details
@endpush
<div>
    <!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->
    <main id="main" class="main">
        @livewire('layouts.page-title',['pageTitle'=> 'Order Details'])
        <!-- End Page Title -->
        @if ($this->order->count() == null)
        @livewire('layouts.empty-page',['tableName'=> 'Order Detail Table'])
        @else
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mb-5 mt-3">
                                <div class="row d-flex align-items-baseline">
                                    <div class="col-xl-9">
                                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID:
                                                #{{ $orderId }}</strong>
                                        </p>
                                    </div>
                                    <div class="col-xl-3 float-end d-print-none">
                                        <button class="btn btn btn-outline-secondary btn-sm px-3"
                                            onclick="window.print()">Print <i class="bi bi-printer"></i></button>
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
                                                <li class="text-muted"><i class="fas fa-phone"></i><span
                                                        class="fw-bold">Phone : </span>
                                                    {{ $phone }}</li>
                                                <li class="text-muted"><span class="fw-bold">City: </span>{{ $city }}
                                                </li>
                                                <li class="text-muted"><span class="fw-bold">State : </span>{{ $state }}
                                                </li>
                                                <li class="text-muted"><span class="fw-bold">Address :
                                                    </span>{{ $address }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4">
                                            <p class="text-muted">Invoice</p>
                                            <ul class="list-unstyled">
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    <span class="fw-bold">ID:</span>#{{ $orderId }}
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
                                                        <td>{{ $orderStatus }}
                                                        </td>
                                                    </span>
                                                </li>
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i>
                                                    @if ($paymentStatus == 0)
                                                    <span class="me-1 fw-bold">Payment Status:</span><span
                                                        class="badge bg-warning text-black fw-bold">
                                                        <td>UnPaid
                                                        </td>
                                                    </span>
                                                    @elseif ($paymentStatus == 1)
                                                    <span class="me-1 fw-bold">Payment Status:</span><span
                                                        class="badge bg-primary text-black fw-bold">
                                                        <td>Paid
                                                        </td>
                                                    </span>
                                                    @endif
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
                                                    <th scope="col">Discount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ $key+1 }}</th>
                                                    <td>{{ $item[0] }}</td>
                                                    <td>{{ $item[1] }}</td>
                                                    <td>{{ $item[2] }}</td>
                                                    <td>{{ $item[3] }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="col-6 mt-3">
                                                <form wire:submit.prevent='update'>
                                                    <select wire:model='changedStatus' class="form-select"
                                                        aria-label="Default select example">
                                                        <option value="Approved">Approved</option>
                                                        <option value="Delivered">Delivered</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Canceled">Canceled</option>
                                                        <option value="Returned">Returned</option>
                                                    </select>
                                                    <br>
                                                        <x-form-input-field.submit color='primary' buttonName="Save">
                                                        </x-form-input-field.submit>
                                                </form>
                                            </div>

                                        </div>
                                        <div class="col-xl-3">
                                            <ul class="list-unstyled">
                                                <li class="text-muted ms-3 mt-2"><span class="fw-bold me-4">Shiping</span>${{ number_format($shippingCost, 2) }}
                                                </li>
                                                @if ($coupon !== null)
                                                <li class="text-muted ms-3 mt-2"><span
                                                    class="fw-bold me-4">Coupon</span>${{ number_format($coupon, 2) }}
                                                </li>
                                                @endif
                                                @if ($discount > 0)
                                                <li class="text-muted ms-3 mt-2"><span
                                                    class="fw-bold
                                                    me-4">Discount</span>${{ number_format($discount, 2) }}
                                                </li>
                                                @endif

                                                <li class="text-muted ms-3"><span
                                                        class="fw-bold me-4">SubTotal</span>${{ number_format($subtotal, 2) }}
                                                </li>

                                            </ul>
                                            <p class="text-black float-start mx-3"><span class="fw-bold me-4">Total :
                                                </span><span style="font-size: 25px;">
                                                    @if ($discount > 0 && $coupon !== null)
                                                        ${{ number_format(ceil(($subtotal + $shippingCost) - ($discount + $coupon)), 2) }}
                                                    @elseif ($discount > 0)
                                                        ${{ number_format(ceil(($subtotal + $shippingCost) - $discount), 2) }}
                                                    @elseif ($coupon !== null)
                                                        ${{ number_format(ceil(($subtotal + $shippingCost) - $coupon), 2) }}
                                                    @else
                                                        ${{ number_format(ceil($subtotal + $shippingCost), 2) }}
                                                    @endif
                                                </span></p>
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
        @endif
    </main>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->
</div>