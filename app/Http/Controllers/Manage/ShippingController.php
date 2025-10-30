<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Session;
use App\Models\CreateShipment;
use App\Models\CartItem;

class ShippingController extends Controller
{
    //


    public function Shipping($id){
        $delivery = [];
        $order = Order::where('order_no', decrypt($id))->first();
        $shipment = CreateShipment::where('order_id', $order->order_no)->first();
        if($shipment){
            $delivery = json_decode($shipment->selected_courier, true);
        }

        return view('manage.sales.shipping')
                ->with('shipping', ShippingAddress::where('id', $order->address_id)->first())
                ->with('bheading', 'Shipping Address')
                ->with('delivery', $delivery)
                ->with('breadcrumb', 'Shipping Address');
    }

}
