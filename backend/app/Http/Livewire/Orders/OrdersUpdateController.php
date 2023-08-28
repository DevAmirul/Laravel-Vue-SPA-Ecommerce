<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersUpdateController extends Component {
    public object $order;
    public object $orderItems;
    public int $orderId;
    public string $name;
    public string $city;
    public string $state;
    public string $phone;
    public string $address;
    public string $created_at;
    public int $coupon;
    public string $couponType;
    public int $discount;
    public int $subtotal;
    public int $total;
    public string $orderStatus;
    public string $changedStatus;
    public bool $paymentStatus;
    public array $items            = [];
    public array $soldProductArray = [];
    public int $shippingCost;

    protected array $rules = [
        'changedStatus' => 'required|in:approved,delivered,pending,canceled,returned',
    ];

    public function updated($propertyName): void {
        $this->validateOnly($propertyName, $this->rules);
    }

    public function mount($id): void {
        $this->orderId = $id;
        $this->order   = DB::table('orders')->where('orders.id', '=', $id)
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('shipping_methods', 'orders.shipping_method_id', '=', 'shipping_methods.id')
            ->join('coupons', 'orders.coupon_id', '=', 'coupons.id')
            ->join('billing_details', 'users.id', '=', 'billing_details.user_id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'orders.id', 'orders.order_status', 'orders.payment_status', 'orders.discount', 'orders.subtotal', 'orders.total', 'orders.created_at', 'coupons.discount as c_discount',
                'users.name', 'users.email', 'shipping_methods.cost',
                'billing_details.phone', 'billing_details.city', 'billing_details.state', 'billing_details.zip_code', 'billing_details.address', 'order_items.qty', 'order_items.discount_price', 'products.id as p_id', 'products.name', 'products.sale_price', 'products.original_price',
            )->get();

        foreach ($this->order as $value) {
            array_push($this->items, [
                $value->name, $value->qty, $value->sale_price, $value->discount_price,
            ]);
            array_push($this->soldProductArray, ['product_id' => $value->p_id, 'revenue' => 11, 'cost' => 22, 'sold_qty' => $value->qty]);
        }

        $this->orderId       = $id;
        $this->name          = $this->order[0]->name;
        $this->orderStatus   = $this->order[0]->order_status;
        $this->paymentStatus = $this->order[0]->payment_status;
        $this->city          = $this->order[0]->city;
        $this->state         = $this->order[0]->state;
        $this->address       = $this->order[0]->address;
        $this->phone         = $this->order[0]->phone;
        $this->created_at    = $this->order[0]->created_at;
        $this->discount      = $this->order[0]->discount;
        $this->coupon        = $this->order[0]->c_discount;
        $this->subtotal      = $this->order[0]->subtotal;
        $this->total         = $this->order[0]->total;
        $this->changedStatus = $this->order[0]->order_status;
        $this->shippingCost  = $this->order[0]->cost;
    }

    public function save(): void {
        Order::where('id', $this->orderId)->update(['order_status' => $this->changedStatus]);
        if ($this->changedStatus == 'Delivered') {
            foreach ($this->soldProductArray as $product) {
                DB::table('revenue_from_purchase_and_sale_of_products')
                    ->updateOrInsert(['product_id' => $product['product_id']],
                        [
                            'revenue'  => DB::raw('revenue+' . $product['revenue']),
                            'cost'     => DB::raw('cost+' . $product['cost']),
                            'sold_qty' => DB::raw('sold_qty+' . $product['sold_qty']),
                        ]
                    );
            }
        }
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render() {
        return view('livewire.orders.orders-update');
    }
}
