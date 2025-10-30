<?php 
namespace App\Services;

use App\Mail\paymentMail;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ShippingAddress;

use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;

class baseFuncs 
{
    function createOrder($req)
    {
      return  Order::create([
            'user_id' => auth_user()->id,
            'order_no' => $req->orderNo,
            'payable' => $req->amount,
            'payment_ref' => null,
            'payment_method' => 'Card Payment',
            'address_id' => $req->address_id,
            'is_paid' => 0,
            'is_delivered' => 0,
            'dispatch_status' => 0,
            'shipping_method' => $req->delivery,
        ]);
    }

    public function getAddress($req)
    {
        $addrs = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
            $data = [
                'name' => auth()->user()->first_name. ' '.auth()->user()->last_name,
                'order_No' =>  $req->orderNo,
                'delivery_method' =>  $req->delivery,
                'receiver_name' =>$addrs->name, 
                'phone' =>  $addrs->phone, 
                'email' => $addrs->email,
                'address' => $addrs->address.' '.$addrs->city.' '.$addrs->state.' '.$addrs->country,
                'order_items' => Cart::content(),
                'total' =>  $req->amount,
                'amount' => $req->amount,
                'shipment' => $req->fee
              ];

    return $data;
    }


    public function storePaymentInfo($order_no, $request, $ref, $channel)
    {
            
        Payment::create([
            'user_id' => auth_user()->id, 
            'order_id' => $order_no, 
            'payment_ref' => $ref, 
            'external_ref' => $request['reference']??$request['flw_ref'], 
            'status' => 1, 
            'channel' => $channel,
            'payable' => ($request['amount'])
        ]);
    }


    public function sendPaymentEmail($request, $order_no, $ref)
    {
        Mail::to(auth_user()->email)->send(new paymentMail([
            'amount' => ($request['amount']),
            'order_No' => $order_no,
            'payment_ref' => $ref,
            'external_ref' => $request['reference'],
           ]));
    }

    public function getFlutterPaymentLink($url,$jsonBody)
{
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($jsonBody),
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer '.getenv('Flutter_SECRET_KEY'), 
                'Content-Type: application/json'
            ]
        ]);
        $response = curl_exec($curl);
        // dd( $response);
        $error = curl_error($curl);
        curl_close($curl);
        $res = json_decode($response, true);
        return  $res;
}

public function flutterwaveVerify($trnx)
{
    $url = "https://api.flutterwave.com/v3/transactions/{$trnx}/verify";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer ".getenv('Flutter_SECRET_KEY'), 
            "Content-Type: application/json"
        ]
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    if ($response) {
        $data = json_decode($response, true);
        if (isset($data['status']) && $data['status'] === 'success') {
            return $data;  
        }
        return false;
    }
}


}