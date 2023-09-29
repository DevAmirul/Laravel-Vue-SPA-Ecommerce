<?php

namespace App\Http\Livewire\Orders;

use App\Http\Traits\EnumTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersController extends Component {
    use TableColumnTrait, EnumTableTrait, WithPagination;

    /**
     * Set table column.
     *
     * @return void
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'Discount', 'Subtotal', 'Total', 'Status', 'time', 'Action'],
            ['id', 'discount', 'subtotal', 'total', 'order_status', 'created_at', 'updated_at']
        );
        $this->enumTrait(
            ['order_status'],
            [['Approved', 'Delivered', 'Pending', 'Canceled', 'Returned']],
            [['badge text-bg-info', 'badge text-bg-success', 'badge text-bg-secondary', 'badge text-bg-danger', 'badge text-bg-dark']]
        );
    }

    /**
     * Redirect to update controller.
     *
     * @param integer $orderId
     * @return RedirectResponse
     */
    public function update($orderId): RedirectResponse {
        return redirect()->route('orders.update', $orderId);
    }

    /**
     * Delete order.
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): int {
        return Order::destroy($id);
    }

    public function render(): View {
        $orders = Order::where('id', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.orders.orders', [
            'orders' => $orders,
        ]);
    }
}
