<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Product;
use App\Services\CartProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function inbox(Request $request): Response
    {
        $carts = CartProductService::getCartProduct($request);
        return response(compact('carts'), 200);
    }

    public function deleteCartItems(Request $request): Response
    {
        CartItem::destroy($request->id);
        return response(true, 200);
    }

    public function getCoupon(Request $request): Response
    {
        $coupon = Coupon::whereCode($request->code)->where('expire_date', '>', now())->where('status', 1)->first(['id','discount']);

        return response(compact('coupon'), 200);
    }

    public function save(Request $request): Response
    {
        $cart = Cart::updateOrCreate(['user_id' => $request->user]);
        $cart->cartItem()->updateOrCreate(['cart_id' => $cart->id, 'product_id' => $request->productId], ['qty' => DB::raw('qty+1')]);

        return response($cart->id, 200);
    }

    public function updateCartItems(Request $request): Response
    {
        CartItem::whereCartId($request->cartId)->whereProductId($request->productId)->update(['qty' => $request->qty]);

        return response($request->cartId, 200);
    }

    public function countCart(Request $request): Response
    {
        $cartItemNumber = Cart::select('id')->whereUserId($request->userId)->withCount('cartItem')->first();
        return response(compact('cartItemNumber'), 200);
    }
}
