<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Services\Payment\PaymentService;
use App\Models\Market\CartItem;
use App\Models\Market\CashPayment;
use App\Models\Market\Copan;
use App\Models\Market\OfflinePayment;
use App\Models\Market\OnlinePayment;
use App\Models\Market\Order;
use App\Models\Market\OrderItem;
use App\Models\Market\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerPaymentController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        return view('customer.sales-process.payment', compact('cartItems', 'order'));
    }

    public function copanDiscount(Request $request)
    {
        $request->validate(
            ['copan' => 'required']
        );

        $copan = Copan::where([['code', $request->copan], ['status', 1], ['end_date', '>', now()], ['start_date', '<', now()]])->first();
        if ($copan != null) {
            if ($copan->user_id != null) {
                $copan = Copan::where([['code', $request->copan], ['status', 1], ['end_date', '>', now()], ['start_date', '<', now()], ['user_id', auth()->user()->id]])->first();
                if ($copan == null) {
                    return redirect()->back()->withErrors(['copan' => ['کد تخفیف اشتباه وارد شده است']]);
                }
            }

            $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->where('copan_id', null)->first();

            if ($order) {
                if ($copan->amount_type == 0) {
                    $copanDiscountAmount = $order->order_final_amount * ($copan->amount / 100);
                    if ($copanDiscountAmount > $copan->discount_ceiling) {
                        $copanDiscountAmount = $copan->discount_ceiling;
                    }
                } else {
                    $copanDiscountAmount = $copan->amount;
                }

                $order->order_final_amount = $order->order_final_amount - $copanDiscountAmount;

                $finalDiscount = $order->order_total_products_discount_amount + $copanDiscountAmount;

                $order->update(
                    ['copan_id' => $copan->id, 'order_copan_discount_amount' => $copanDiscountAmount, 'order_total_products_discount_amount' => $finalDiscount]
                );

                return redirect()->back()->with(['copan' => 'کد تخفیف با موفقیت اعمال شد']);
            } else {
                return redirect()->back()->withErrors(['copan' => ['کد تخفیف اشتباه وارد شده است']]);
            }
        } else {
            return redirect()->back()->withErrors(['copan' => ['کد تخفیف اشتباه وارد شده است']]);
        }
    }

    public function paymentSubmit(Request $request, PaymentService $paymentService)
    {
        $request->validate(
            ['payment_type' => 'required']
        );

        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $cash_receiver = null;

        switch ($request->payment_type) {
            case '1':
                $targetModel = OnlinePayment::class;
                $type = 0;
                $paymentType = 0;
                break;
            case '2':
                $targetModel = OfflinePayment::class;
                $type = 1;
                $paymentType = 1;
                break;
            case '3':
                $targetModel = CashPayment::class;
                $type = 2;
                $paymentType = 2;
                $cash_receiver = $request->cash_receiver ? $request->cash_receiver : null;
                break;
            default:
                return redirect()->back()->withErrors(['error' => 'خطا']);
        }

        $paymented = $targetModel::create([
            'amount' => $order->order_final_amount,
            'user_id' => auth()->user()->id,
            'pay_date' => now(),
            'cash_receiver' => $cash_receiver,
            'status' => 1,
        ]);

        $payment = Payment::create(
            [
                'amount' => $order->order_final_amount,
                'user_id' => auth()->user()->id,
                'pay_date' => now(),
                'type' => $type,
                'paymentable_id' => $paymented->id,
                'paymentable_type' => $targetModel,
                'staus' => 1,
            ]
        );

        if ($request->payment_type == 1) {
            $order->update(
                ['payment_type' => $paymentType]
            );
            $paymentService->zarinpal($order->order_final_amount, $paymented, $order);
        } else {
            $order->update(
                ['order_status' => 3, 'payment_type' => $paymentType]
            );

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product' => $cartItem->product,
                    'amazing_sale_id' => $cartItem->product->activeAmazingSales()->id ?? null,
                    'amazing_sale_object' => $cartItem->product->activeAmazingSales() ?? null,
                    'amazing_sale_discount_amount' => empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice * ($cartItem->product->activeAmazingSales()->percentage / 100),
                    'number' => $cartItem->number,
                    'final_product_price' => ($cartItem->product->price) - (empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice * ($cartItem->product->activeAmazingSales()->percentage / 100)),
                    'final_total_price' => ($cartItem->product->price) - (empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice * ($cartItem->product->activeAmazingSales()->percentage / 100)) * ($cartItem->number),
                    'color_id' => $cartItem->color_id,
                    'guarantee_id' => $cartItem->guarantee_id,
                ]);
                $cartItem->delete();
            }
            return redirect()->route('customer.home')->with('success', 'سفارش شما با موفقیت ثبت شد');
        }

    }

    public function paymentCallback(Order $order, OnlinePayment $onlinePayment, paymentService $paymentService)
    {
        $amount = $onlinePayment->amount * 10;
        $result = $paymentService->zarinpalVerify($amount, $onlinePayment);
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product' => $cartItem->product,
                'amazing_sale_id' => $cartItem->product->activeAmazingSales()->id ?? null,
                'amazing_sale_object' => $cartItem->product->activeAmazingSales() ?? null,
                'amazing_sale_discount_amount' => empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice * ($cartItem->product->activeAmazingSales()->percentage / 100),
                'number' => $cartItem->number,
                'final_product_price' => ($cartItem->cartItemProductPrice) - (empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice * ($cartItem->product->activeAmazingSales()->percentage / 100)),
                'final_total_price' => ($cartItem->product->price) - (empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice * ($cartItem->product->activeAmazingSales()->percentage / 100)) * ($cartItem->number),
                'color_id' => $cartItem->color_id,
                'guarantee_id' => $cartItem->guarantee_id,
            ]);
            $cartItem->delete();
        }
        if ($result['success']) {
            $order->update(
                ['order_status' => 3, 'payment_status' => 1]
            );
            return redirect()->route('customer.home')->with('success', 'سفارش شما با موفقیت ثبت شد');
        }
        $order->update(
            ['order_status' => 2]
        );
        return redirect()->route('customer.home')->with('danger', 'پرداخت ناموفق بود');
    }

}
