<?php

namespace App\Http\Livewire\Orders;

use App\Http\Traits\EnumTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Order;
use Livewire\Component;

class OrdersController extends Component {
    use TableColumnTrait, EnumTableTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Discount', 'Subtotal', 'Total', 'Order Status', 'time', 'Action'],
            ['id', 'discount', 'subtotal', 'total', 'order_status', 'created_at', 'updated_at']
        );
        $this->enumTrait(
            ['order_status'],
            [['approved', 'delivered', 'pending', 'canceled', 'returned']],
            [['badge text-bg-info', 'badge text-bg-success', 'badge text-bg-secondary', 'badge text-bg-danger', 'badge text-bg-dark']]
        );
    }
    public function update($orderId) {
        return redirect()->route('orders.update', $orderId);
    }

    public function destroy($id): int {
        return Order::destroy($id);
    }

    public function render() {
        $orders = Order::where('id', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.orders.orders', [
            'orders' => $orders,
        ]);
    }
}
