<?php

namespace App\Listeners;

use App\Events\CartItemsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\CartItem;
use Illuminate\Queue\InteractsWithQueue;

class AddCartItems implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CartItemsEvent  $event
     * @return void
     */
    public function handle(CartItemsEvent $events)
    {    
            foreach($events->carts as $cart){
            $data = [
                'user_id' => auth_user()->id,
                'product_id' => $cart['rowId'],
                'Order_no' => $events->orderNo,
                'qty' => $cart['quantity'],
                'payable' => $cart['price'] * $cart['quantity'],
                'status' => 0,
                'cartSession' => $events->cartSession,
                'image' => $cart['image'],
                'product_name' => $cart['name'],
                'price' => $cart['price'],
                'product_prescription' => $cart->options->image??null
            ];
            CartItem::create($data);
          }
    }
}
