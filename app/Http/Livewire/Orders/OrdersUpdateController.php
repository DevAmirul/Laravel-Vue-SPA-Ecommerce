<?php

namespace App\Http\Livewire\Orders;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Order;
use App\Models\RevenueFromProduct;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersUpdateController extends Component {
    use TableHeaderTrait;

    public object $order;
    public object $orderItems;
    public int $ordersId;
    public string $name;
    public string $city;
    public string $state;
    public int $phone;
    public string $address_1;
    public string $created_at;
    public int $discount;
    public int $subtotal;
    public int $total;
    public string $status;
    public array $items        = [];
    public array $productIdArr = [];

    public function mount($id): void{
        $this->ordersId = $id;
        $this->order    = DB::table('orders')->where('orders.id', '=', $id)
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('user_addresses', 'orders.user_id', '=', 'user_addresses.user_id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'orders.id', 'orders.status', 'orders.discount', 'orders.subtotal', 'orders.total', 'orders.created_at',
                'users.name', 'users.email',
                'user_addresses.phone', 'user_addresses.city', 'user_addresses.state', 'user_addresses.zip_code', 'user_addresses.address_1', 'user_addresses.address_2',
                'order_items.qty', 'order_items.after_discount_price',
                'products.id as p_id', 'products.title', 'products.price',
            )
            ->get();

        foreach ($this->order as $value) {
            array_push($this->items, [
                $value->p_id, $value->title, $value->qty, $value->price, $value->after_discount_price,
            ]);
            array_push($this->productIdArr, [$value->p_id, $value->qty, $value->after_discount_price]);
        }

        $this->status     = $this->order[0]->status;
        $this->ordersId   = $id;
        $this->name       = $this->order[0]->name;
        $this->city       = $this->order[0]->city;
        $this->state      = $this->order[0]->state;
        $this->address_1  = $this->order[0]->address_1;
        $this->phone      = $this->order[0]->phone;
        $this->created_at = $this->order[0]->created_at;
        $this->discount   = $this->order[0]->discount;
        $this->subtotal   = $this->order[0]->subtotal;
        $this->total      = $this->order[0]->total;
    }

    public function save(): int{
        Order::where('id', $this->ordersId)->update(['status' => $this->status]);
        // TODO: update or create product revenue table.
        // foreach ($this->productIdArr as $value) {
        //     $revenueFromProduct = RevenueFromProduct::where('product_id', $value[0]);
        //     dd()
        //     if ($revenueFromProduct) {
        //         $revenueFromProduct->sold_qty = $revenueFromProduct->sold_qty + $value[1];
        //         $revenueFromProduct->revenue  = ($value[1] * $value[2]) + $revenueFromProduct->revenue;
        //         $revenueFromProduct->save();
        //     }else {
        //         $revenueFromProduct = new RevenueFromProduct();
        //         $revenueFromProduct->product_id = $value[0];
        //         $revenueFromProduct->sold_qty = $value[1];
        //         $revenueFromProduct->revenue = $value[1] * $value[2];
        //         $revenueFromProduct->save();
        //     }
        // }
        dd('ok');
    }

    public function render() {
        return view('livewire.orders.orders-update');
    }
}
