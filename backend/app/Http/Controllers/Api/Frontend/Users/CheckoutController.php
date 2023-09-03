<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\BillingDetails;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingMethod;
use App\Models\User;
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
        $billingDetails = BillingDetails::firstWhere('user_id', $request->id);
        return response(compact('carts', 'methods', 'billingDetails'), 200);
    }

    public function create(CheckoutRequest $request): Response
    {
        $cartItems = DB::table('carts')
            ->join('cart_items','carts.id', '=', 'cart_items.cart_id')
            ->join('products', 'cart_items.product_id','=', 'products.id')
            ->join('offers', 'products.offer_id','=', 'offers.id')
            ->select('cart_items.product_id', 'cart_items.qty', 'offers.discount', 'offers.type', 'offers.status', 'offers.expire_date')
            ->where('carts.user_id', $request->validated('user_id'))->get();

        $cartItemArray = [];
        foreach ($cartItems as $value) {
            if ($value->status == true && $value->expire_date) {
                array_push($cartItemArray, ['product_id' => $value->product_id, 'qty' => $value->qty, 'discount_price' => $value->discount]);
            }else{
                array_push($cartItemArray, ['product_id' => $value->product_id, 'qty' => $value->qty]);
            }
        }

        $user = User::find($request->validated('user_id'), 'id');
        $user->billingDetail()->updateOrCreate(['user_id' => $request->validated('user_id')], [
            'phone'=> $request->validated('phone'),
            'city'=> $request->validated('city'),
            'state'=> $request->validated('state'),
            'zip_code'=> $request->validated('zip_code'),
            'address'=> $request->validated('address'),
            'address_2'=> $request->validated('address_2'),
        ]);
        $order = $user->order()->create([
            'discount' => $request->validated('discount') ,
            'subtotal' => $request->validated('subtotal') ,
            'total' => $request->validated('total') ,
            'shipping_method_id' => $request->validated('shipping_method_id') ,
            'coupon_id' => $request->validated('coupon_id') ,
        ]);
        $order->orderItem()->createMany($cartItemArray);
        Cart::whereUserId($request->validated('user_id'))->delete();

        return response(true, 200);
    }
}
