<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Interfaces\paymentInterface;
use App\Mail\ManualPaymentEmail;
use App\Models\CountryCurrency;
use App\Models\ManualPayment;
use App\Models\Product;
use App\Services\paymentServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ManualPaymentController extends Controller
{
    //

    public $generatePayment;
    public function __construct(paymentInterface $generatePayment)
    {
       $this->generatePayment = $generatePayment;
    }


    public function Index()
    {
        return view('manage.payments.index')
        ->with('bheading', 'Manual Payment')
        ->with('breadcrumb', 'Manual Payment')
        ->with('payments', ManualPayment::latest()->get());
    }

    public function create()
    {
        return view('manage.payments.generate')
        ->with('currency', CountryCurrency::get())
        ->with('products', Product::get())
        ->with('bheading', 'Manual Payment')
        ->with('breadcrumb', 'Manual Payment');
    }

    public function AdminInitiatePayment(Request $request)
    {
        $generated = $this->generatePayment->AdminInitiatePayment($request);
        // dd($generated );
        if($generated){
            Session::flash('alert', 'success');
            Session::flash('message', 'Payment Information sent to user email');
            return redirect()->intended(route('admin.manual.payments'));
        }
        Session::flash('alert', 'error');
        Session::flash('message', 'Request failed, try again');
        return back();
        // return redirect()->intended(route('admin.create.payments'))->withInput($request->all());
}

    public function SendEmail(Request $request)
    {
        try{
        $paymantData = ManualPayment::where('id', $request->payment_id)->first();
        Mail::to($paymantData->email)->send(new ManualPaymentEmail($paymantData));
        Session::flash('alert', 'success');
        Session::flash('message', 'Payment Information sent to user email');
        return back();
        }catch(\Exception $e)
        {
            Session::flash('alert', 'error');
            Session::flash('message', $e->getMessage());
            return back();
        }
    }

    public function ProcessPayment(Request $request)
    {
        try{
            $payment = $this->generatePayment->ProcessManualPayment($request);
          return view('users.pages.paymentSuccess')
          ->with('payment', $payment);
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
