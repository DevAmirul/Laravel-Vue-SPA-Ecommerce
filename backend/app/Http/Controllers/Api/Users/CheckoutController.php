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
use App\Services\CartProductService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller {

    public function inbox(Request $request): JsonResponse {
        $carts = CartProductService::getCartProduct($request);

        $shippingMethods = ShippingMethod::all('id', 'name', 'cost');

        $paymentMethods = PaymentType::all('type');

        $billingDetails = BillingDetails::firstWhere('user_id', $request->id);

        return response()->json(compact('carts', 'shippingMethods', 'paymentMethods', 'billingDetails'));
    }

    /**
     * Place order by the authenticated user.
     */
    public function placeOrder(Payments $payment, CheckoutRequest $request): JsonResponse {
        $cartItems = CartProductService::getCartProduct($request);

        $orderItems = [];

        foreach ($cartItems as $value) {
            if ($value->status == true && $value->expire_date > now()) {
                if ($value->type === 'Percentage') {
                    $discount = number_format(($value->discount / 100) * $value->sale_price);
                }
                array_push($orderItems, ['product_id' => $value->p_id, 'qty' => $value->qty, 'discount_price' => $discount ?? $value->discount]);
            } else {
                array_push($orderItems, ['product_id' => $value->p_id, 'qty' => $value->qty]);
            }
        }

        $user = User::find($request->id, ['id', 'name', 'email']);

        $user->billingDetail()->updateOrCreate(['user_id' => $request->id], [
            'phone'     => $request->validated('phone'),
            'city'      => $request->validated('city'),
            'state'     => $request->validated('state'),
            'zip_code'  => $request->validated('zip_code'),
            'address'   => $request->validated('address'),
            'address_2' => $request->validated('address_2'),
        ]);

        $order = $user->order()->create([
            'discount'           => $request->validated('discount'),
            'subtotal'           => $request->validated('subtotal'),
            'total'              => $request->validated('total'),
            'shipping_method_id' => $request->validated('shipping_method_id'),
            'coupon_id'          => $request->validated('coupon_id'),
        ]);

        $order->orderItem()->createMany($orderItems);

        Cart::whereUserId($request->id)->delete();

        Mail::to($user->email)->send(new SendInvoice($cartItems, $user, $order, $request->validated()));

        if ($request->validated('payment') === 'Online Payment') {
            try {
                $checkoutSession = $payment->checkOut($order);
                Order::whereId($order->id)->update(['session_id' => $checkoutSession['sessionId']]);
            } catch (\Stripe\Exception\CardException $e) {
                throw new \Stripe\Exception\CardException("A payment error occurred: {$e->getError()->message}");
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                throw new \Stripe\Exception\InvalidRequestException("An invalid request occurred.");
            } catch (Exception $e) {
                throw new Exception("Another problem occurred, maybe unrelated to Stripe.");
            }
        }

        return response()->json(['stripeUrl' => $checkoutSession['stripeUrl'] ?? null, 'status' => 'Successfully created order']);
    }

    /**
     * If the payment is due, the payment will be made from here.
     */
    public function payOrder(Payments $payment, Request $request): JsonResponse {
        try {
            $checkoutSession = $payment->checkOut(null);
            Order::whereId($request->id)->update(['session_id' => $checkoutSession['sessionId']]);
        } catch (\Stripe\Exception\CardException $e) {
            throw new \Stripe\Exception\CardException("A payment error occurred: {$e->getError()->message}");
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            throw new \Stripe\Exception\InvalidRequestException("An invalid request occurred.");
        } catch (Exception $e) {
            throw new Exception("Another problem occurred, maybe unrelated to Stripe.");
        }

        return response()->json(['stripeUrl' => $checkoutSession['stripeUrl'] ?? null]);
    }
}
