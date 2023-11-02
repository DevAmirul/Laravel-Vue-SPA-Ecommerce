@push('title')
Dashboard
@endpush
<div>
    <!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <hr>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->
    <main id="main" class="main">
        <!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-7">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="# " data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showSale("Today")'>
                                                <button class="dropdown-item">Today</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showSale("This Month")'>
                                                <button class="dropdown-item">This Month</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showSale("This Year")'>
                                                <button class="dropdown-item">This Year</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Sales <span>| {{ $strTimeOfSale }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $sale }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Sales Card -->
                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showRevenue("Today")'>
                                                <button class="dropdown-item">Today</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showRevenue("This Month")'>
                                                <button class="dropdown-item">This Month</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showRevenue("This Year")'>
                                                <button class="dropdown-item">This Year</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| {{ $strTimeOfRevenue }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $revenue }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Revenue Card -->
                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-6">
                            <div class="card info-card customers-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showUsers("Today")'>
                                                <button class="dropdown-item">Today</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showUsers("This Month")'>
                                                <button class="dropdown-item">This Month</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showUsers("This Year")'>
                                                <button class="dropdown-item">This Year</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Customers <span>| {{ $strTimeOfUsers }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $users }}</h6>
                                            {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Customers Card -->
                        <!-- All Order Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showOrders("Today")'>
                                                <button class="dropdown-item">Today</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showOrders("This Month")'>
                                                <button class="dropdown-item">This Month</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showOrders("This Year")'>
                                                <button class="dropdown-item">This Year</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Orders <span>| {{ $strTimeOfOrders }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box2"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalOrders }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End All Order Card -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showRecentSale("Today")'>
                                                <button class="dropdown-item">Today</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showRecentSale("This Month")'>
                                                <button class="dropdown-item">This Month</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showRecentSale("This Year")'>
                                                <button class="dropdown-item">This Year</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Recent Sales <span>| {{ $strTimeOfRecentSale }}</span>
                                    </h5>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Preview</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">SKU</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($newRecentSaleProducts as $product)
                                            <tr>
                                                <th scope="row"><img
                                                            src="{{ $product[1] }}" alt="{{ $product[1] }}">
                                                </th>
                                                <td>{{ $product[2] }}
                                                </td>
                                                <td>{{ $product[3] }}</td>
                                                <td class="fw-bold">${{ $product[4] }}</td>
                                                <td>{{ $product[5] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->
                        <!-- New Arrivals -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showArrivals("Today")'>
                                                <button class="dropdown-item">Today</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showArrivals("This Month")'>
                                                <button class="dropdown-item">This Month</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form wire:submit.prevent='showArrivals("This Year")'>
                                                <button class="dropdown-item">This Year</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body pb-0">
                                    <h5 class="card-title">New Arrivals <span>| {{ $strTimeOfArrivals }}</span>
                                    </h5>
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Preview</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($newArrivalProducts as $product)
                                            <tr>
                                                <th scope="row"><img
                                                            src="{{ $product->image }}" alt="{{ $product->image }}">
                                                </th>
                                                <td>{{ $product->name }}
                                                </td>
                                                <td class="fw-bold">${{ $product->sale_price }}</td>
                                                <td>{{ $product->qty_in_stock }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End New Arrivals -->
                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top Revenue </h5>
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Preview</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Sold</th>
                                                <th scope="col">Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ $topRevenueProducts }} --}}
                                            @foreach ($topRevenueProducts as $topRevenueProduct)
                                            <tr>
                                                <th scope="row"><img src="{{ $topRevenueProduct->product?->image }}"
                                                        alt="{{ $topRevenueProduct->product?->image }}">
                                                </th>
                                                <td>{{ $topRevenueProduct->product?->name }}
                                                </td>
                                                <td class="fw-bold">${{ $topRevenueProduct->product?->sale_price }}</td>
                                                <td>{{ $topRevenueProduct->sold_qty }}</td>
                                                <td class="fw-bold">${{ $topRevenueProduct->revenue }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Top Selling -->
                    </div>
                </div><!-- End Left side columns -->
                <!-- Right side columns -->
                <div class="col-lg-5">
                    <!--Button Strat -->
                    <div class="card" wire:ignore>
                        <div class="card-body m-auto mt-3">
                            <button type="button" wire:click='AllCalculationsAreBasedOnDayOrMonthOrYear("Today")'
                                class="btn btn-outline-primary btn-sm">Today</button>
                            <button type="button" wire:click='AllCalculationsAreBasedOnDayOrMonthOrYear("This Month")'
                                class="btn btn-outline-secondary btn-sm">This Month</button>
                            <button type="button" wire:click='AllCalculationsAreBasedOnDayOrMonthOrYear("This Year")'
                                class="btn btn-outline-success btn-sm">This Year</button>
                        </div>
                    </div>
                    <!--End Button Strat -->
                    <!--Chart Js -->
                    <div class="card" wire:ignore>
                        <div class="card-body">
                            <h5 class="card-title">Orders Bar Chart</h5>
                            <!-- Bar Chart -->
                            <canvas id="barChart" style="max-height: 400px;"></canvas>
                            <!-- End Bar CHart -->
                        </div>
                    </div>
                    <!-- End Chart Js -->
                    <!-- Start order circle Chart Js -->
                    <div class="card " wire:ignore>
                        <div class="card-body ">
                            <h5 class="card-title">Orders Chart <span></span></h5>

                            <!-- Doughnut Chart -->
                            <canvas id="orderChart" style="max-height: 400px;"></canvas>

                            <!-- End Doughnut CHart -->

                        </div>
                    </div>
                    <!-- End order circle Chart Js -->
                    <!-- Start order circle Chart Js -->
                    <div class="card " wire:ignore>
                        <div class="card-body ">
                            <h5 class="card-title">Income Expenditure Chart <span></span>
                            </h5>
                            <!-- Doughnut Chart -->
                            <canvas id="incomeExpenditureChart" style="max-height: 400px;"></canvas>
                            <!-- End Doughnut CHart -->
                        </div>
                    </div>
                    <!-- End order circle Chart Js -->


                </div>
                <!-- End Right side columns -->
            </div>

        </section>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>

@push('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#barChart'), {
        type: 'bar',
        data: {
            labels: @js($ordersBarChart->pluck('month')->toArray()),
            datasets: [{
            label: 'Orders Quantity',
            data: @js($ordersBarChart->pluck('total')->toArray()),
            backgroundColor: [
                'rgba(155,255,3, 0.2)',
                'rgba(255,0,55, 0.2)',
                'rgba(55,13,22, 0.2)',
                'rgba(68,229,255, 0.2)',
                'rgb(56,42,251, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgb(173,59,57, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',

            ],
            borderColor: [
                'rgb(155,255,3)',
                'rgb(255,0,55)',
                'rgb(55,13,22)',
                'rgb(68,229,255)',
                'rgb(56,42,251)',
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(173,59,57)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',

            ],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });
    });

    function capitalizeWords(arr) {
    return arr.map(word => {
    const firstLetter = word.charAt(0).toUpperCase();
    const rest = word.slice(1).toLowerCase();
    return firstLetter + rest;
    });
    }

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#orderChart'), {
        type: 'doughnut',
        data: {
            labels: capitalizeWords(@js($ordersChart->pluck('order_status')->toArray())),
            datasets: [{
            label: 'Quantity',
            data: @js($ordersChart->pluck('status_quantity')->toArray()),
            backgroundColor: [
                'rgb(255, 165, 0)',
                'rgb(54, 162, 235)',
                'rgb(50, 205, 50)',
                'rgb(255, 0, 0)',
                'rgb(0, 0, 255)',
            ],
            hoverOffset: 4
            }]
        }
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#incomeExpenditureChart'), {
        type: 'doughnut',
        data: {
            labels: ['Revenue','Cost'],
            datasets: [{
            label: 'Amount of money',
            data: @js([$incomeExpenditureChart->sum('revenue'),$incomeExpenditureChart->sum('cost')]),
            backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 0, 0)',
            ],
            hoverOffset: 4
            }]
        }
        });
    });

</script>
@endpush
