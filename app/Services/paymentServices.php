<?php

namespace App\Services;

use App\Events\OrderShipment;
use App\Interfaces\paymentInterface;
use App\Mail\ManualPaymentEmail;
use App\Mail\OrderMail;
use App\Models\CountryCurrency;
use App\Models\ManualPayment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\ShippingAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Unicodeveloper\Paystack\Facades\Paystack;

class paymentServices extends baseFuncs implements paymentInterface
{

    public function InitiatePayment($request)
    {
        if ($request->payment_method == 'paystack') return $this->initiatePaystackCheckout($request);
        if ($request->payment_method == 'flutter')  return $this->initiateFlutterCheckout($request);
    }


    public function initiatePaystackCheckout($req)
    {
        $data = array(
            "amount" => $req->amount * 100,
            "reference" => GenerateRef(20),
            "email" => auth_user()->email,
            "currency" => $req->currency,
            "order_id" => $req->orderNo,
            "metadata" => $req->orderNo,
            "payment_method" => $req->payment_method
        );
        Parent::createOrder($req);
        Session::put('order_No', $req->orderNo);
        Session::put('amount', $req->amount);
        $shippingInfo = $this->getAddress($req);
        Mail::to(auth()->user()->email)->send(new OrderMail($shippingInfo));
        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function initiateFlutterCheckout($request)
    {
        try {
            $userData =   getUserLocationData();
            $settins = Setting::first();
            // dd($userData);

            $currency = CountryCurrency::where('country', $userData['country'])->first();
            //   dd($currency);
            $txRef = 'SNL-' . time();
            // dd($currency->exchange_rate);
            // dd($request->amount*$currency->exchange_rate);

            $data = [
                'tx_ref' =>  $txRef,
                'amount' => isset($currency->exchange_rate) ? $request->amount * $currency->exchange_rate : $request->amount,
                'currency' => $currency->currency ?? 'USD',
                'redirect_url' => url('flutter/callback'),
                // 'redirect_url' => 'https://api.flutterwave.com/v3/payments',
                'customer' => [
                    'email' => auth_user()->email,
                    'name' => auth_user()->first_name . ' ' . auth_user()->first_name,
                    'phonenumber' => auth_user()->phone
                ],
                'customizations' => [
                    'title' => 'SANLIVE PHARMACY',
                    'logo' => 'https://sanlivepharmacy.com/images/1730996017Untitled%20design%20(2).png'
                ]
            ];
            // dd( $data);
            Parent::createOrder($request);
            $res = parent::getFlutterPaymentLink('https://api.flutterwave.com/v3/payments', $data);

            // if (isset($res) && $res['status'] === 'success') {
            Session::put('order_No', $request->orderNo);
            Session::put('amount', $request->amount);
            return redirect($res['data']['link'])
                ->header('Content-Type', 'text/html');
        } catch (\Exception $e) {
            Session::flash('alert', 'error');
            Session::flash('msg', 'Unable to initialize payment ' . $e->getMessage());
            return back()->with('error', 'Unable to initialize payment');
        }
    }

    public function HanglePaystackPayment($request)
    {
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        if ($request['status'] == true) {
            $order_no =  Session::get('order_No');
            $orders = Order::where('order_no', $order_no)->first();

            $orders->update([
                'external_ref' => $request['reference'],
                'is_paid' => 1,
                'channel' => 'Paystack'
            ]);
            $ref = GenerateRef(10);
            $this->storePaymentInfo($order_no, $request, $ref, 'Paystack');
            if ($orders->shipping_method == 'home_delivery') {
                event(new OrderShipment($address, $order_no));
            }
            $this->sendPaymentEmail($request, $order_no, $ref);
            Cart::destroy();
            return true;
        } else {
            return false;
        }
    }

    public function ProcessFlutterPayment($request)
    {
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        $res =  parent::flutterwaveVerify($request['transaction_id']);
        if ($res['status'] == 'success') {
            $order_no =  Session::get('order_No');
            $orders = Order::where('order_no', $order_no)->first();
            $ref = GenerateRef(10);
            $orders->update([
                'external_ref' => $res['data']['flw_ref'],
                'is_paid' => 1,
                'channel' => 'Flutterwave'
            ]);
            $this->storePaymentInfo($order_no, $res['data'], $ref, 'Flutterwave');
            if ($orders->shipping_method == 'home_delivery') {
                event(new OrderShipment($address, $order_no));
            }
            $this->sendPaymentEmail($request, $order_no, $ref);
            Cart::destroy();
        }
        return false;
    }

    public function AdminInitiatePayment($request)
    {

        $valid = Validator::make($request->all(), [
            'currency' => 'required',
            'name' => 'required',
            'email' => 'required',
            'product_name' => 'required'
        ]);
         if($valid->fails()) return false;
        try {
            $currency = CountryCurrency::where('currency', $request->currency)->first();
            [$product_name, $amount] = $this->getProductPrice($request);
            $amount = isset($currency->exchange_rate) ? (($amount + $currency->shipping_fee) * $currency->exchange_rate) : $amount+$currency->shipping_fee;
            $txRef = 'SNL-' . time();
            $paymantData = [
                'amount' => $amount,
                'products_name' =>  $product_name,
                'payment_ref' =>  $txRef,
                'name' => $request->name,
                'subject' => 'Order Payment Link',
                'currency' => $request->currency,
                'shipping_fee' => $currency->shipping_fee
                ];
                $paymantData = (object) $paymantData;
                // dd($paymantData );
           $payments =  $this->createPayment($request, $paymantData);
           if(!$payments) return back();
            $data = [
                'tx_ref' =>  $txRef,
                'amount' => $amount,
                'currency' => $currency->currency ?? 'USD',
                'redirect_url' => url('manual/payment/processes'),
                // 'redirect_url' => 'https://api.flutterwave.com/v3/payments',
                'customer' => [
                    'email' => $request->email,
                    'name' => $request->first_name . ' ' . $request->first_name,
                    // 'phonenumber' => 
                ],
                'meta' => [
                    'payment_id'  => $payments->id,
                ],
                'customizations' => [
                    'title' => 'SANLIVE PHARMACY',
                    'logo' => 'https://sanlivepharmacy.com/images/1730996017Untitled%20design%20(2).png'
                ]
            ];
            $res = parent::getFlutterPaymentLink('https://api.flutterwave.com/v3/payments', $data);
            $payments->update([
                'payment_link' => $res['data']['link'],
            ]);
            $payments->subject = "Order Payment Link";
            Mail::to($request->email)->send(new ManualPaymentEmail($payments));
            return $res['data']['link'];
        } catch (\Exception $e) {
          $pay =  ManualPayment::where('email', $request->email)->latest()->first();
            if($pay)$pay->delete();
            return false;
        }
    }

    public function getProductPrice($request)
    {
        $prices = [];
        $product_name = [];
        foreach ($request->product_name as $prod) {
            $products = Product::where('id', $prod)->first();
            $prices[] = $products->sale_price;
            $product_name[] = $products->name; 
        }
        return [$product_name, array_sum($prices)];
    }

    private function createPayment($request, $paymantData)
    {
        // dd($paymantData->products_name);
        return ManualPayment::create([
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $paymantData->amount,
            'products_name' => json_encode($paymantData->products_name),
            'payment_ref' => $paymantData->payment_ref,
            'currency' => $request->currency,
            'payment_status' => 'pending',
            'date_paid',
            'order_status' => 'pending',
            'external_ref'
        ]);
    }

    public function ProcessManualPayment($request)
    {
        $res =  parent::flutterwaveVerify($request['transaction_id']);
        if ($res['status'] == 'success') {
        $payment = ManualPayment::where('id', $res['data']['meta']['payment_id'])->first();
        $payment->update(['payment_status' => 'completed', 'order_status' => 'paid', 'external_ref'=> $res['data']['tx_ref'], 'date_paid' => now()]);
        return $payment;
        }
     return false;
    }
}
