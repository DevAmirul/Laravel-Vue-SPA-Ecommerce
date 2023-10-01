
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="container mb-5 mt-3">
                            <div class="row d-flex align-items-baseline">
                                <div class="col-xl-9">
                                    <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #{{ $order->id }}</strong></p>
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
                                            <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{ $user->name }}</span></li>
                                            <li class="text-muted">City: {{ $request['city'] }}</li>
                                            <li class="text-muted">State: {{ $request['state'] }}</li>
                                            <li class="text-muted">Phone: {{ $request['phone'] }}</li>
                                            <li class="text-muted">Email: {{ $user->email }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="text-muted">Invoice</p>
                                        <ul class="list-unstyled">
                                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                    class="fw-bold">ID:</span>#{{ $order->id }}</li>
                                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                    class="fw-bold">Creation Date: </span>{{ $order->created_at->toFormattedDateString() }}</li>
                                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                    class="me-1 fw-bold">Status:
                                                    @if ($order->payment_status)
                                                        </span><span class="badge bg-success text-black fw-bold"> Paid</span>
                                                    @else
                                                        </span><span class="badge bg-warning text-black fw-bold"> Unpaid</span>
                                                    @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row my-2 mx-1 justify-content-center">
                                    <table class="table table-striped table-borderless">
                                        <thead style="background-color:#84B0CA ;" class="text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Unit Discount</th>
                                                <th scope="col">UnitPrice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>
                                                        @if ($item->type === 'Percentage')
                                                        ${{ number_format(($item->discount / 100) * $item->sale_price) }}
                                                        @else
                                                        ${{ number_format($item->discount) }}
                                                        @endif
                                                    </td>
                                                    <td>${{ number_format($item->sale_price) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3">
                                        @if ($order->shipping_method_id)
                                            <ul class="list-unstyled">
                                                <li class="text-muted ms-3"><span class="text-black me-4">Shiping</span>${{ $request['shipping'] }}</li>
                                            </ul>
                                        @endif
                                        @if ($order->coupon_id)
                                            <ul class="list-unstyled">
                                                <li class="text-muted ms-3"><span class="text-black me-4">Coupon</span>${{ $request['coupon'] }}</li>
                                            </ul>
                                        @endif
                                        @if ($order->discount)
                                            <ul class="list-unstyled">
                                                <li class="text-muted ms-3"><span class="text-black me-4">Total Discount</span>${{ $order->discount }}</li>
                                            </ul>
                                        @endif
                                        <ul class="list-unstyled">
                                            <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>${{ $order->subtotal }}</li>
                                        </ul>
                                        <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span>
                                            <span style="font-size: 25px;">
                                                ${{ $order->total }}
                                            </span></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-10">
                                        <p>Thank you for your purchase</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
