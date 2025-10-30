<?php

namespace App\Http\Controllers\Users;

use Cart;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShippingAddress(){
        $address = ShippingAddress::where(['user_id' => auth_user()->id])->latest()->get();
        
        addHashId($address);

        return view('users.carts.address')
        ->with('carts', \Cart::content())
        ->with('addresses', $address);
    }

    public function UpdateDefaultAddress($id){
    $id = Hashids::connection('products')->decode($id);
    $add = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
    if($add){
        $add->update(['is_default' => 0]);
    }
    ShippingAddress::whereId($id)->update(['is_default' => 1]);
    Session::flash('alert', 'success');
    Session::flash('msg', 'Address Updated Successfully');
    return redirect()->route('checkout.index');
    }

    public function CreateAddress(){
        return view('users.carts.create_address')
        ->with('carts', Cart::content());
    }

    public function storeAddress(Request $req){

            $valid = Validator::make($req->all(), [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'city' => 'nullable',
                'country' => 'nullable',
                'state' => 'nullable'
            ]);
            if($valid->fails()){ 
        return back()->withInput($req->all())->withErrors($valid);
            }
        if($req->is_default == 1){
            ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->update(['is_default' => 0]);
        }
        $data = [
            'user_id' => auth_user()->id,
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'city' => $req->city,
            'country' => $req->country,
            'state' => $req->state,
            'is_default' => $req->is_default
        ];
        ShippingAddress::create($data);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Address Added successfully');
        return redirect()->intended(route('checkout.index'));
    }

    public function UpdateAddress($id){
    
    }
}
