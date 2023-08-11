<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingMethod;
use App\Services\CartProductService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckoutController extends Controller
{
    public function inbox(Request $request): Response
    {
        $carts = CartProductService::getCartProduct($request);
        $methods = ShippingMethod::all('id', 'name', 'cost');
        return response(compact('carts', 'methods'), 200);
    }

    public function create(Request $request): Response
    {
        // $cartItems = DB::table('carts')
        //     ->join('cart_items','carts.id','=', 'cart_items.cart_id')
        //     ->select('cart_items.product_id', 'cart_items.qty', 'cart_items.discount_price')
        //     ->where('user_id',$request->userId)->get();

        // $cartItemArray = [];
        // foreach ($cartItems as  $value) {
        //     array_push($cartItemArray, ['product_id' => $value->product_id, 'qty' => $value->qty, 'discount_price' => $value->discount_price]);
        // }

        // $order = Order::create($request->data['order']);
        // $order->orderItem()->createMany($cartItemArray);

        return response(true, 200);
    }
}
