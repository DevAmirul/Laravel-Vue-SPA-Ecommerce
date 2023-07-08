<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Order;
use Livewire\Component;

class OrdersController extends Component {
    use TableHeaderTrait;

    public array $status;

    public function mount(): void{
        $this->status = ['Canceled', 'delivered','approved', 'pending'];
        $this->traitMount(
            ['Id', 'Order Status', 'Discount', 'Subtotal', 'Total', 'Action'],
            ['id', 'status', 'discount', 'subtotal', 'total']
        );
    }
    public function update($orderId) {
        return redirect()->route('orders.update', $orderId);
    }

    public function render() {
        $orders = Order::where('id', $this->searchStr)
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.orders', [
            'orders' => $orders,
        ]);
    }
}
