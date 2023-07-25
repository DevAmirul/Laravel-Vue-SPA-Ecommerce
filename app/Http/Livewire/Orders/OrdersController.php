<?php

namespace App\Http\Livewire\Orders;

use App\Http\Traits\TableColumnTrait;
use App\Models\Order;
use Livewire\Component;

class OrdersController extends Component {
    use TableColumnTrait;

    public array $status;

    public function mount(): void{
        $this->status = ['Canceled', 'delivered', 'approved', 'pending'];
        $this->tableColumnTrait(
            ['Id', 'Order Status', 'Discount', 'Subtotal', 'Total', 'time', 'Action'],
            ['id', 'order_status', 'discount', 'subtotal', 'total', 'created_at', 'updated_at']
        );
    }
    public function update($orderId) {
        return redirect()->route('orders.update', $orderId);
    }

    public function render() {
        $orders = Order::where('id', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.orders.orders', [
            'orders' => $orders,
        ]);
    }
}
