<x-mail::message>


    Dear, {{ $order->user->name }}<br>
    Your order has been {{ $OrderStatus }}<br>
    Order Id: #{{ $order->id }}<br>
    Order Status: {{ ($order->payment_status == 1) ? 'Paid' : 'Unpaid' }}<br>

Thanks for your order,<br>
{{ config('app.name') }}
</x-mail::message>


{{-- <x-mail::message>

    Dear, {{ $name }},<br>
Your order has been {{ $OrderStatus }}.<br>
Order Id: #{{ $orderId }}<br>
Order Status: {{ ($paymentStatus == 1) ? 'Paid' : 'Unpaid' }}<br>

<x-mail::button :url="''">
    {{ ($paymentStatus == 1) ? 'Paid' : 'Pay Now' }}
    paid
</x-mail::button>

Thanks for Your Order,<br>
{{ config('app.name') }}
</x-mail::message> --}}