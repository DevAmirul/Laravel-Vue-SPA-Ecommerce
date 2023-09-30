<?php

namespace App\Http\Livewire\Orders;

use App\Mail\OrderStatusInformation;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;

class OrdersUpdateController extends Component {
    public int $orderId;
    public object $order;
    public string $changedStatus;

    protected array $rules = [
        'changedStatus' => 'required|in:approved,delivered,pending,canceled,returned',
    ];

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules);
    }

    /**
     * Get order's by id.
     */
    public function mount(int $id): void {
        $this->orderId = $id;

        $this->order = Order::where('id', $this->orderId)->with([
            'shippingMethod:id,cost', 'coupon:id,discount',
            'user:id,name,email' => ['billingDetail'],
            'orderItem'          => ['product:id,name,sale_price'],
        ])->firstOrFail();

        $this->changedStatus = $this->order->order_status;
    }

    /**
     * Update order & send mail.
     */
    public function update(): void {

        Order::where('id', $this->orderId)->update(['order_status' => $this->changedStatus]);

        if ($this->changedStatus == 'Delivered') {
            foreach ($this->order->orderItem as $item) {
                DB::table('revenue_from_purchase_and_sale_of_products')
                    ->updateOrInsert(['product_id' => $item->product_id],
                        [
                            'revenue'  => DB::raw('revenue+' . $item->product->sale_price - $item->discount_price),
                            'cost'     => DB::raw('cost+' . $item->product->sale_price),
                            'sold_qty' => DB::raw('sold_qty+' . $item->qty),
                        ]
                    );
            }
        }
        Mail::to($this->order->user->email)->send(new OrderStatusInformation($this->changedStatus, $this->order));

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.orders.orders-update');
    }
}
