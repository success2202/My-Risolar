<?php

namespace App\Http\Controllers\Users;

use App\Events\OrderShipment;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Interfaces\paymentInterface;
use App\Mail\OrderMail;
use App\Mail\RegMail;
use App\Models\Order;
use App\Mail\paymentMail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Models\ShippingAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */

     public $paymentServic;
     public function __construct(paymentInterface $paymentServic)
     {
        $this->paymentServic = $paymentServic;
     }

     public function InitiatePayment(PaymentRequest $request)
     {
        return $this->paymentServic->InitiatePayment($request);
     }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handlePaystackCallback()
    {
        try{
        $paymentDetails = Paystack::getPaymentData();
        $this->paymentServic->HanglePaystackPayment($paymentDetails);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Order completed successfully');
        return redirect(route('users.orders'));
        
        }catch(\Exception $e)
        {
            Session::flash('alert', 'error');
            Session::flash('msg', $e->getMessage());
            return Redirect::back();
        }
    }

    public function handleFlutterCallback(Request $request)
    {
        try{
           $res = $this->paymentServic->ProcessFlutterPayment($request);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Order completed successfully');
        return redirect(route('users.orders'));
        }catch(\Exception $e)
        {
            Session::flash('alert', 'error');
            Session::flash('msg', 'Payment Failed '.$e->getMessage());
            return Redirect::back();
            
        }

    }

    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // Store payment/order in DB
        // Example:
        // Order::create([
        //   'user_id' => auth()->id(),
        //   'amount' => $paymentDetails['data']['amount'] / 100,
        //   'reference' => $paymentDetails['data']['reference'],
        //   'status' => $paymentDetails['data']['status'],
        // ]);

        return redirect()->route('orders.success')->with('success', 'Payment successful! Your order has been placed.');
    }





}
