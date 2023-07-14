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
        <x-layouts.page-title pageTitle='Dashboard' pageUrl=''></x-layouts.page-title>
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
                                    <h5 class="card-title">Sales <span>| {{ $timeToStrForSale }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $sale }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
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
                                    <h5 class="card-title">Revenue <span>| {{ $timeToStrForRevenue }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>${{ $revenue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->
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
                                    <h5 class="card-title">Customers <span>| {{ $timeToStrForUsers }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $users }}</h6>
                                            <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->
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
                                    <h5 class="card-title">Orders <span>| {{ $timeToStrForOrders }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box2"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalOrders }}</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End All Order Card -->
                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                {{-- <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div> --}}
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top Selling</h5>
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
                                            @foreach ($topRevenueProducts as $topRevenueProduct)
                                            {{-- <tr>
                                                <th scope="row"><a
                                                        href="{{ route('products.show', ['id' => $topRevenueProduct[0] ]) }}"><img
                                                src="{{ $topRevenueProduct[1] }}" alt="{{ $topRevenueProduct[1] }}"></a>
                                            </th>
                                            <td><a href="{{ route('products.show', ['id' => $topRevenueProduct[0] ]) }}"
                                                    class="text-primary fw-bold">{{ $topRevenueProduct[2] }}</a>
                                            </td>
                                            <td>${{ $topRevenueProduct[3] }}</td>
                                            <td class="fw-bold">{{ $topRevenueProduct[4] }}</td>
                                            <td class="fw-bold">${{ $topRevenueProduct[5] }}</td>
                                            </tr> --}}

                                            <tr>
                                                <th scope="row"><a
                                                        href="{{ route('products.show', ['id' => $topRevenueProduct->product_id ]) }}"><img
                                                            src="{{ $topRevenueProduct->product->image }}"
                                                            alt="{{ $topRevenueProduct->product->image }}"></a>
                                                </th>
                                                <td><a href="{{ route('products.show', ['id' => $topRevenueProduct->product_id ]) }}"
                                                        class="text-primary fw-bold">{{ $topRevenueProduct->product->title }}</a>
                                                </td>
                                                <td>${{ $topRevenueProduct->product->price }}</td>
                                                <td class="fw-bold">{{ $topRevenueProduct->sold_qty }}</td>
                                                <td class="fw-bold">${{ $topRevenueProduct->revenue }}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Top Selling -->

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
                                    <h5 class="card-title">Recent Sales <span>| {{ $timeToStrForRecentSale }}</span>
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
                                                <th scope="row"><a
                                                        href="{{ route('products.show', ['id' => $product[0] ]) }}"><img
                                                            src="{{ $product[1] }}" alt="{{ $product[1] }}"></a>
                                                </th>
                                                <td><a href="{{ route('products.show', ['id' => $product[0] ]) }}"
                                                        class="text-primary fw-bold">{{ $product[2] }}</a>
                                                </td>
                                                <td>{{ $product[3] }}</td>
                                                <td>${{ $product[4] }}</td>
                                                <td class="fw-bold">{{ $product[5] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->
                <!-- Right side columns -->
                <div class="col-lg-5">
                    <!--Chart Js -->
                    <div class="card" wire:ignore>
                        <div class="card-body">
                            <h5 class="card-title">Revenue Chart</h5>
                            <!-- Bar Chart -->
                            <canvas id="barChart" style="max-height: 400px;"></canvas>
                            <!-- End Bar CHart -->

                        </div>
                    </div>
                    <!-- End Chart Js -->
                    <div class="card " wire:ignore>
                        <div class="filter">    
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body ">
                            <h5 class="card-title">Orders Chart <span>| {{ $timeToStrForRecentSale }}</span></h5>

                            <!-- Doughnut Chart -->
                            <canvas id="doughnutChart" style="max-height: 400px;"></canvas>

                            <!-- End Doughnut CHart -->

                        </div>
                    </div>
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
                                <h5 class="card-title">New Arrivals <span>| {{ $timeToStrForArrivals }}</span>
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
                                            <th scope="row"><a
                                                    href="{{ route('products.show', ['id' => $product->id ]) }}"><img
                                                        src="{{ $product->image }}" alt="{{ $product->image }}"></a>
                                            </th>
                                            <td><a href="{{ route('products.show', ['id' => $product->id ]) }}"
                                                    class="text-primary fw-bold">{{ $product->title }}</a>
                                            </td>
                                            <td>${{ $product->price }}</td>
                                            <td class="fw-bold">{{ $product->qty_in_stock }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End New Arrivals -->
                </div><!-- End Right side columns -->
            </div>
        </section>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>

@push('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#barChart'), {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', ],
            datasets: [{
            label: 'Bar Chart',
            data: [65, 59, 80, 81, 56, 55],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
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
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: [
            'Red',
            'Blue',
            'Yellow'
            ],
            datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
            }]
        }
        });
    });
</script>
@endpush