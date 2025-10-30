<?php

namespace App\Listeners;
use App\Events\OrderShipment;
use App\Models\CreateShipment;
use App\Models\Setting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Base;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class CreateShipmentOder implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderShipment  $event
     * @return void
     */
    public function handle(OrderShipment $event)
    {
        $carts = \Cart::content();
        $settings = Setting::first();
  

        $address = json_decode($event->address, true);
        $orderNo = $event->orderNo;
        if (ucfirst($address['state']) == 'Lagos') {
            $data = [
                "sender_name" => $settings->name,
                "sender_address" => $settings->address,
                "sender_phone" => $settings->site_phone,
                "sender_email" => $settings->site_email,
                "receipient_name" => $address['name'],
                "receipient_address" => $address['address'],
                "receipient_phone" => $address['phone'],
                "receipient_email" => $address['email'],
                "vehicle" => "bike",
                "item_category" => "Medical products",
                "location_from" => $settings['address'],
                "location_to" =>  $address['city'],
                "description" => "Supply of medical products puchased on our website"
            ];
            $url = 'gidi2gidi/shipments';
        } else {
            $data = [
                "origin_name" => $settings->site_name,
                "origin_phone" =>  $settings->site_phone,
                "origin_email" => $settings->site_email,
                "origin_street" => $settings->address,
                "origin_city" => "yaba",
                "destination_name" => $address['name'],
                "destination_phone" =>  $address['phone'],
                "destination_street" => $address['address'],
                "destination_city" => $address['city'],
                "destination_state" => $address['state'],
                "destination_email" => $address['email'],
                "item_quantity" => count($carts),
                "item_category" => "Skin Care Preparations",
                "description" => "Supply of medical products puchased on our website",
                "item_value" => \Cart::priceTotalFloat(),
                "weight" => 1,
                "item_name" => "medical Items",
                "item_amount" => \Cart::priceTotalFloat()
            ];
            $url = 'gidi2naij/shipments';
        }

     try{
        $client = new Base(shippingBase($url), 'post', env('GIDIAPIKey'), $data);
        $response = $client->Client();
        if (isset($response['status']) && $response['status'] == 'success') {
            CreateShipment::create([
                'user_id' => auth_user()->id,
                'order_id' => $orderNo,
                'address_id' => $address['id'],
                'sender_name' => isset($response['sender_name'])?$response['sender_name']:null,
                'sender_address' => isset($response['sender_address'])?$response['sender_address']:null,
                'sender_phone'=> isset($response['sender_phone'])?$response['sender_phone']:null,
                'sender_email'=> isset($response['sender_email'])?$response['sender_email']:null,
                'receipient_name'=> isset($response['receipient_name'])?$response['receipient_name']:$response['destination_name'],
                'receipient_address'=> isset($response['receipient_address'])?$response['receipient_address']:$response['destination_street'],
                'receipient_phone'=> isset($response['receipient_phone'])?$response['receipient_phone']:$response['destination_phone'],
                'receipient_email'=> isset($response['receipient_email'])?$response['receipient_email']:$response['destination_email'],
                'fee'=> isset($response['fee'])?$response['fee']:0,
                'tracking_number'=> isset($response['tracking_number'])?$response['tracking_number']:null,
                'origin'=> isset($address['state'])?$address['state']:null,
                'destination'=> isset($response['sender_email'])?$response['sender_email']:null,
                'item_category'=> isset($response['item_category'])?$response['item_category']:null,
                'description'=> isset($response['description'])?$response['description']:null,
                'vehicle'=> 'bike',
                'status'=> isset($response['payment_status'])?$response['payment_status']:null,
                'payment_status'=> isset($response['sender_email'])?$response['sender_email']:null
            ]);
        }else{
            CreateShipment::create([
                'user_id' => auth_user()->id,
                'order_id' => $orderNo,
                'address_id' => $address['id'],
                'status'=> 'Could not create shipping details'
            ]);
        }
    }catch(Exception  $e){
        $res = $e->getMessage();
        return $res;
    }
    
    }
}
