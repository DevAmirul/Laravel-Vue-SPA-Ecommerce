<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Services\CartProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {
    public function inbox(Request $request): JsonResponse {
        return response()->json(['carts' => CartProductService::getCartProduct($request)]);
    }

    public function destroy(Request $request): JsonResponse {
        CartItem::destroy($request->id);
        return response()->json(['status' => 'Successfully deleted item']);
    }

    public function getCoupon(Request $request): JsonResponse {
        $coupon = Coupon::whereCode($request->code)->where('expire_date', '>', now())->where('status', 1)->first(['id', 'discount']);

        return response()->json(compact('coupon'));
    }

    public function add(Request $request): JsonResponse {
        $cart = Cart::updateOrCreate(['user_id' => $request->userId]);
        $cart->cartItem()->updateOrCreate(['cart_id' => $cart->id, 'product_id' => $request->productId], ['qty' => DB::raw('qty')]);
        return response()->json(['status' => 'Successfully added item']);
    }

    public function update(Request $request): JsonResponse {
        CartItem::whereCartId($request->cartId)->whereProductId($request->productId)->update(['qty' => $request->qty]);
        return response()->json(['status' => 'Successfully updated item']);
    }

    public function count(Request $request): JsonResponse {
        $cartItemNumber = Cart::select('id')->whereUserId($request->userId)
            ->withCount('cartItem')->first();
        return response()->json(compact('cartItemNumber'));
    }
}
