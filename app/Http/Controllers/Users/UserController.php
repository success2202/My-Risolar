<?php

namespace App\Http\Controllers\Users;

use App\Events\OrderShipment;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\CreateShipment;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {

        return view('users.accounts.account')
            ->with('address', ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first())
            ->with('account', User::where('id', auth_user()->id)->first());
    }

    public function Orders()
    {
        $orders = DB::table('orders')->join('cart_items', 'orders.order_no', '=', 'cart_items.order_no')
            ->where('orders.user_id', auth_user()->id)
            ->orderBy('orders.created_at', 'DESC')
            ->simplePaginate(5);
        addHashId($orders);
// dd($orders);
        //  $orders = Order::with('cartItems')
        // ->where('user_id', auth()->id())
        // ->orderBy('created_at', 'DESC')
        // ->paginate(5);
      
        return view('users.accounts.orders')
            ->with('orders',  $orders);
    }

    public function myorders()
{
//     $orders = auth()->user()->Orders()->latest()->get();
// dd($orders);
    return view('users.accounts.orders', compact('orders'));
}


    public function OrderDetails($order_no)
    {
        $orders = Order::where('order_no', $order_no)->first();
        // dd($orders);
        if(!isset($orders)){
            Session::flash('alert', 'error');
            Session::flash('msg', 'An error occured fetching order details');
            return back();
        }
        $order_items = CartItem::where('order_no', $order_no)->get();
        $shipping = ShippingAddress::where('id', $orders->address_id)->first();
        // $shipping = Order::with(['cartItems', 'shipping'])
        // ->where('order_no', $order_no)
        // ->firstOrFail();
        // dd( $shipping);

        $delivery = CreateShipment::where('order_id', $order_no)->first();
        return view('users.accounts.order_details')
            ->with('orders', $orders)
            ->with('order_items', $order_items)
            ->with('shipping', $shipping)
           
            ->with('delivery', $delivery);
    }

    public function Addresses()
    {
        $address = ShippingAddress::where('user_id', auth_user()->id)->get();
        addHashId($address);
        return view('users.accounts.address')
            ->with('addresses', $address);
    }

    public function EditAddress($id)
    {
        $id = Hashids::connection('products')->decode($id);
        $address = ShippingAddress::where('id', $id)->first();
        $address->hashid = Hashids::connection('products')->encode($address->id);
        return view('users.accounts.addressEdit')
            ->with('address', $address);
    }

    public function UpdateAddress(Request $req, $id)
    {
        $id = Hashids::connection('products')->decode($id);
        $data = [
            'user_id' => auth_user()->id,
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'address' => $req->address,
            'city' => $req->city,
            'country' => $req->country,
            'state' => $req->state,
            'is_default' => $req->is_default ?? '0',
        ];

        if ($req->is_default) {
            ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->update(['is_default' => 0]);
        }

        $address = ShippingAddress::where('id', $id)->first();
        $address->fill($data)->save();
        $check = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        if (!isset($check)) {
            ShippingAddress::where(['user_id' => auth_user()->id, 'id' =>  $id])->update(['is_default' => 1]);
            Session::flash('alert', 'error');
            Session::flash('msg', 'Request Failed, you must have one default address');
            return back();
        }
        Session::flash('alert', 'success');
        Session::flash('msg', 'Address Updated Successfully');
        return back();
    }

    public function CreateAddress()
    {
        return view('users.accounts.address_create');
    }

    public function storeAddress(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable'
        ]);
        if ($valid->fails()) {
            return back()->withInput($req->all())->withErrors($valid);
        }
        if ($req->is_default == 1) {
            ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->update(['is_default' => 0]);
        }
        $data = [
            'user_id' => auth_user()->id,
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'city' => $req->city,
            'email' => $req->email,
            'country' => $req->country,
            'state' => $req->state,
            'is_default' => $req->is_default ?? 0
        ];
        ShippingAddress::create($data);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Address Added successfully');
        return redirect()->intended(route('users.account.address'));
    }

    public function AddressDelete($id)
    {
       
      
        $id = Hashids::connection('products')->decode($id);
        $check = ShippingAddress::where(['user_id' => auth_user()->id])->get();
        if (count($check) > 1) {
            $address = ShippingAddress::where(['user_id' => auth_user()->id, 'id' => $id])->first();
            $address->delete();
            Session::flash('alert', 'error');
            Session::flash('msg', 'Address Deleted from Address Book');
            return back();
        } else {
            Session::flash('alert', 'error');
            Session::flash('msg', 'You Must have atleat One Address in your Address Book');
            return back();
        }
        return back();
    }

    public function recentViews()
    {
        $products = session()->get('products.recently_viewed');
        if (is_array($products)) {
            $data = array_unique($products);
            $datas = array_slice($data, -10, 10, true);
            $products['recent'] = Product::whereIn('id', $datas)->take(10)->latest()->get();
            addHashId($products['recent']);
        } else {
            $products['recent'] = [];
        }
        return view('users.accounts.recent_views', $products);
    }

    public function OrderPayments()
    {
        return view('users.accounts.payments')
            ->with('payments', Payment::where('user_id', auth_user()->id)->get());
    }


    public function AccountSettings()
    {
        return view('users.accounts.settings')
            ->with('user', User::where('id', auth_user()->id)->first());
    }

    public function UpdateAccountSettings(Request $req)
    {
        $user = User::whereId(auth_user()->id)->first();

        if(isset($req->first_name)){
            $data['first_name'] = $req->first_name;
        }
        if(isset($req->last_name)){
            $data['last_name'] = $req->last_name;
        }
        if(isset($req->email)){
            $data['email'] = $req->email;
        }
        if(isset($req->phone)){
            $data['phone'] = $req->phone;
        }
        if(isset($req->password)){
            if(Hash::check($req->oldpassword , auth_user()->password)){
                $data['password'] = Hash::make($req->password);
            }else{
                Session::flash('alert', 'error');
                Session::flash('msg', 'Old password is incorrect');
                return back();
            }
        }if(isset($req->city)){
            $data['city'] = $req->city;
        }
        if(isset($req->state)){
            $data['state'] = $req->state;
        }
        if(isset($req->country)){
            $data['country'] = $req->country;
        }

      $user->fill($data)->save();
      Session::flash('alert', 'success');
      Session::flash('msg', 'Account Updated successfully');
      return back();
    }
}
