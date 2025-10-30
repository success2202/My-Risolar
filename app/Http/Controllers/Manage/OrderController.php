<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Mail\DispatchMail;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function Order(){
        $orders = Order::latest()->get();
        addHashId($orders);
        return view('manage.sales.orders')

                ->with('orders', $orders)
                ->with('bheading', 'Users Orders')
                ->with('breadcrumb', 'Orders');
    }

    public function OrderDetails($id){
        $orderItems = CartItem::where('Order_no', decrypt($id))->get();
        return view('manage.sales.orderDetails')
                ->with('ordersItems', $orderItems)
                ->with('bheading', 'Order Details')
                ->with('breadcrumb', 'Order details');
    }

    public function status($id){
        return view('manage.sales.status')
                ->with('order', Order::where('order_no', decrypt($id))->first())
                ->with('bheading', 'Update Status')
                ->with('breadcrumb', 'Update Status');
    }

    public function updateStatus(Request $request, $id){
        $order = Order::where('order_no', $id)->first();
             $order->update([
                'is_delivered' => $request->delivery,
                'is_paid' => $request->payment
                ]);
                if($request->payment == 1){
                    $ref = "SFSL".rand(111111,999999);
                    $order->update(['payment_ref' => $order->payment_ref??$ref]);
                }
                if($request->delivery == 2){
                $order_list = CartItem::where('Order_no', $order->order_no )->get();
                $shipping = ShippingAddress::where('id', $order->address_id )->first();
                //dd($shipping);
                $datas = [
                'order_No' => $order->order_no,
                'name' => $shipping->name,
                'amount' => $order->amount,
                'email' => $shipping->email,
                'receiver_name' => $shipping->name,
                'phone' => $shipping->phone,
                'address' => $shipping->address,
                'delivery_method' => $shipping->delivery_method,
                'order_items' => $order_list,
                ];
                 Mail::to(auth_user()->email)->send(new DispatchMail($datas));
                }
                Session::flash('alert', 'success');
                Session::flash('message', 'Status Updated Successfully');
              return redirect()->back();           
             }
}   
