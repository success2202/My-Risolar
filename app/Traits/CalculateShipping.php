<?php 

namespace App\Traits;

use App\Models\Setting;
use App\Services\Base;

trait CalculateShipping {

    public function createPost($request){
        $settings = Setting::latest()->first();
        $data = [
            "sender_name" => $settings->site_name,
            "sender_address" => $settings->address,
            "sender_phone" => $settings->site_phone,
             "sender_email" => $settings->site_email,
            "receipient_name" => $request->name,
            "receipient_address" => $request->address,
            "receipient_phone" => $request->phone,
            "receipient_email" => $request->email,
            "vehicle" => 'bike',
            "item_category" => 'medical',
            "location_from"=> $settings->address,
            "location_to" => $request->address, 
            "description" => 'Sending Medical Products to customers',
        ];
        $shipping = new Base(shippingBase('shipments'), 'post', env('GIDIAPIKey'), $data);
        $res = $shipping->client();
       return $res;
    }


    public function checkGidiRates($req){
        $shipping = new Base(shippingBase('gidi2gidi/rate'), 'post', env('GIDIAPIKey'), $req);
        $res = $shipping->client();
        return $res;

    }

    public function checkNaijaRates($req){
        $shipping = new Base(shippingBase('gidi2naij/rates'), 'post', env('GIDIAPIKey'), $req);
        $res = $shipping->client();
        return $res;
    }

}