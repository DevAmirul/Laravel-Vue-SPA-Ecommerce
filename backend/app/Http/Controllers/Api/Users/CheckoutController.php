<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Interfaces\Payments;
use App\Mail\SendInvoice;
use App\Models\BillingDetails;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentType;
use App\Models\ShippingMethod;
use App\Models\User;
use App\Repositories\Payments\StripeRepository;
use App\Services\CartProductService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function inbox(Request $request): Response
    {
        $carts = CartProductService::getCartProduct($request);

        $shippingMethods = ShippingMethod::all('id', 'name', 'cost');

        $paymentMethods = PaymentType::all('type');

        $billingDetails = BillingDetails::firstWhere('user_id', $request->id);

        return response(compact('carts', 'shippingMethods', 'paymentMethods', 'billingDetails'), 200);
    }

    public function placeOrder(Payments $payment, CheckoutRequest $request)
    {
        $cartItems = CartProductService::getCartProduct($request);

        $orderItems = [];

        foreach ($cartItems as $value) {
            if ($value->status == true && $value->expire_date > now()) {
                if ($value->type === 'Percentage') {
                    $discount = number_format(($value->discount / 100) * $value->sale_price);
                }
                array_push($orderItems, ['product_id' => $value->p_id, 'qty' => $value->qty, 'discount_price' => $discount ?? $value->discount]);
            }else{
                array_push($orderItems, ['product_id' => $value->p_id, 'qty' => $value->qty]);
            }
        }

        $user = User::find($request->id, ['id', 'name', 'email']);

        $user->billingDetail()->updateOrCreate(['user_id' => $request->id], [
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

        $order->orderItem()->createMany($orderItems);

        // Cart::whereUserId($request->id)->delete();

        // Mail::to($user->email)->send(new SendInvoice($cartItems, $user, $order, $request->validated()));

        if ($request->validated('payment') === 'Online Payment') {
            // TODO: error handaling.
            $payment = $payment->checkOut($order);
            $order = Order::whereId($order->id)->update(['session_id' => $payment['sessionId']]);
        }
        return response(['stripeUrl'=> $payment['stripeUrl'] ?? null, 'status'=> 'Successfully added to order'], 200);
        // return response($order , 200);
    }

    public function payment(Payments $payment) : void {
        $payment = $payment->checkOut(null);
    }
}
