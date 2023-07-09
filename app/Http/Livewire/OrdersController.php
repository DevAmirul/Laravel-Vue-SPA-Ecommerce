<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class OrdersController extends Component {
    use TableHeaderTrait;

    public array $status;

    public function mount(): void{
        $this->status = ['Canceled', 'delivered', 'approved', 'pending'];
        $this->traitMount(
            ['Id', 'Order Status', 'Discount', 'Subtotal', 'Total', 'time', 'Action'],
            ['id', 'status', 'discount', 'subtotal', 'total', 'created_at', 'updated_at']
        );
    }
    public function update($orderId) {
        return redirect()->route('orders.update', $orderId);
    }

    public function render() {
        $orders = Order::where('id', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.orders', [
            'orders' => $orders,
        ]);
    }
}
