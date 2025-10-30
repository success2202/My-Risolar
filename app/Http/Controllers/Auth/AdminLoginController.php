<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    
    public function showLogin(){ 
        return view('auth.admin-login');
    }

    protected function guard(){

        return Auth::guard('admin');

    }

    public function store(LoginRequest $request)
    {
       
        $credentials = $request->only('email', 'password');
        if(Auth('admin')->attempt($credentials)){
            $request->session()->regenerate();
            $user = Admin::whereId(auth('admin')->user()->id)->first();
            $user ->update(['otp' => null, 'is_verified'=> null]); 
            return redirect()->intended(route('admin.index'));
        }else{
            return redirect()->back()->withInput($request->all())->withErrors(['email' => 'Email / Password not correct']);
        }
        
    }
/**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo = '/admin';
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function logout(Request $request)
    { $xl = Admin::where('id', auth('admin')->user()->id)->first();
        $xl->update(['otp' => null]);
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(route('admin-login'));
    }
}
