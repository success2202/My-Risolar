<?php

namespace App\Http\Controllers\Manage;

use App\Events\OrderShipment;
use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use Illuminate\Http\Request;

use App\Models\CartItem;
use App\Models\CreateShipment;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Order;
use App\Models\AdminNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
        public function sendMail($data){
        //   Mail::to($data['email'], 'orders@Trendykay.ng')->send(new DispatchedMail($data));
      }
        
      public function index(){
          return view('manage.users.index')
          ->with('bheading', 'Index')
          ->with('breadcrumb', 'Index')
          ->with('products', count(Product::all()))
          ->with('users', count(User::all()))
          ->with('order', count(Order::all()))
          ->with('orders', Order::latest()->take(5)->get())
          ->with('sales', DB::table('orders')->sum('payable'));
      }
  
      public function Transactions(){
          return view('manage.sales.transactions')
              ->with('transactions', Payment::latest()->get())
              ->with('bheading', 'Payment Transactions')
                  ->with('breadcrumb', 'Transactions');
  
      }
  
      public function Users(){
          return view('manage.users.users')
                  ->with('users', User::latest()->get())
                  ->with('bheading', 'Users')
                  ->with('breadcrumb', 'Users');
  
      }
  
      public function UserOrders($id){
          return view('manage.sales.orders')
                  ->with('orders', Order::where('user_id', decrypt($id))->get())
                  ->with('bheading', 'User\'s Orders' )
                  ->with('breadcrumb', 'Order');
      }
      public function UserTransactions($id){
          return view('manage.sales.transactions')
                  ->with('transactions', Order::where('user_id', decrypt($id))->get())
                  ->with('bheading', 'User\'s Transactions' )
                  ->with('breadcrumb', 'Transactions');
  
      }
  
  
      public function notify(){
          return view('manage.users.notify')
          ->with('bheading', 'Send Email' )
          ->with('breadcrumb', 'Send Email');
      }
  
      public function pushNotify(Request $request){
          $validate = $this->validate($request, [
              'title' => 'required',
              'content'=>'required'
          ]);
          if($validate){
           
            $users = User::latest()->get();
            foreach($users as $user){
            $data = [
                'name' => $user->first_name,
                'subject' => $request->title,
                'content' => $request->content
            ];
            try{
            Mail::to($user->email)->send(new NotifyMail($data));
            }catch(\Exception $e){
                Session::flash('alert', 'error');
                Session::flash('message', 'Error Occured, We could not reach all the emails, but dont worry, we are good to go');
                return back()->withInput($request->all());  
            }
        }
              Session::flash('alert', 'success');
              Session::flash('message', 'Notifications sent Successfully');
              return redirect()->back();
          }else{
            Session::flash('alert', 'error');
            Session::flash('message', 'Something went wrong, please try again'); 
              return back()->withInput($request->all());
          }
      }

      public function Analytical(){
          $data['users'] = User::where('updated_at', '>', Carbon::now()->subHours(24))->latest()->get();
          $data['recentActive'] = User::where('updated_at', '>', Carbon::now()->subHours(24))->latest()->get();
          $data['new_users'] = User::where('created_at', '>', today()->subHours(12))->latest()->get();
          $data['thisweek'] = User::where('created_at', '>', today()->subDays(7))->latest()->get();
          $data['orders'] = Order::where('created_at', '>', Carbon::now()->subHours(24))->latest()->get();
          $data['av_orders'] = Order::where('created_at', '>', Carbon::now()->subDays(7))->latest()->get();
          return view('manage.analytical', $data)
          ->with('bheading', 'Analytics' )
          ->with('breadcrumb', 'Analytics');
      }
  
      public function adminProfile(){
          $admin = Admin::where('id', auth('admin')->user()->id)->first();
          return view('manage.profile', compact('admin'))
          ->with('bheading', 'Admin Profile')
          ->with('breadcrumb', 'Update Admin Details');
      }
  
      public function updateProfile(Request $request){
           $this->validate($request, [
              'oldPassword' => 'required',
              'password' => 'required|min:5',
              ]);
             $hashedPassword = auth('admin')->user()->password;
              if (Hash::check($request->oldPassword , $hashedPassword)) {
              if (!Hash::check($request->password , $hashedPassword)) {
                    $users_password = bcrypt($request->password);
                    Admin::where( 'id' , auth('admin')->user()->id)->update(['password' =>  $users_password]);
                    Session::flash('alert', 'alert-success');
                    Session::flash('pass','Password Updated Successfully');
                    return redirect()->back();
                  }
                  else{
                   Session::flash('alert', 'alert-danger');
                   Session::flash('pass','Old / New Password Cannot be the Same');
                   return redirect()->back();
                   } 
              } else{
             //  dd($hashedPassword);
               Session::flash('alert', 'alert-danger');
               Session::flash('pass','Old Password is Incorrect');
                  return redirect()->back();
              }
      }
  
      public function AdminNotify_clear(){
          $notify = AdminNotification::all();
          foreach($notify as $clear){
              $clear->delete();
          }
          return redirect()->back();
          Session::flash('alert', 'success');
          Session::flash('message','Notification clear');
      }

  
}