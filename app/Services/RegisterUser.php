<?php

namespace App\Services;

use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegMail;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;

class RegisterUser {


    public function viewCheckout(){

        $carts = Cart::content();
        if(count($carts) > 0){
        return view('users.guest')->with('carts', $carts);
        }else{
            return redirect()->intended(route('users.index'));
        }

    }

    public function UserRegister($request){
        $pass = GenerateRef(10);
        $datas = [
            'first_name' => $request->name,
            'last_name' => '',
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => hash::make($pass),
        ];
        User::create($datas);
        $user = User::latest()->first();
        Auth::loginUsingId($user->id);
        sleep(1);
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['country'] = $request->country;
          $data['email'] = $request->email;
        $data['user_id'] = $user->id;
        $data['is_default'] = 1;
        $data['name'] = $user->first_name.''.$user->last_name;
       $ship = ShippingAddress::create($data);
       $data['password'] =  $pass;
       Mail::to($data['email'])->send(new RegMail($datas));
        return $ship;
    }

}