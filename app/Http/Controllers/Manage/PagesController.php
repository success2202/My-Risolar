<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;


use App\Models\Page;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\TermsConditions;
use App\Models\Privacypolicy;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    //

    public function AddMenu(){
        return view('manage.menu.create')
        ->with('bheading', 'Add Menu')
        ->with('breadcrumb', 'Add Menu');
    }

    public function createMenu(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if($valid->fails()){
            Session::flash('alert', 'error');
            Session::flash('m','Some fields are missing');
            return back();
        }
         Page::create([
            'name' => $request->name
         ]);
         Session::flash('alert', 'success');
         Session::flash('message','Menu created successfully');
         return back();

    }

    public function MenuIndex(){
        return view('manage.menu.index')
        ->with('bheading', 'Menu List')
        ->with('breadcrumb', 'Menu List')
        ->with('menu', Page::get());
    }


    public function EditMenu($id){ 
        $id = Page::where('id', decrypt($id))->first();
        
        return view('manage.menu.edit')
        ->with('bheading', 'Edit Menu')
        ->with('breadcrumb', 'Edit Menu')
        ->with('menu', $id);
    }

    public function updateMenu(Request $request, $id){
        $id = Page::where('id', decrypt($id))->first()
        ->update(['name' => $request->name]);
        Session::flash('alert', 'success');
        Session::flash('message','Menu updated successfully');
        return back();
    }

    public function Pages($slug){
        switch($slug){
            case "home":
                return app('App\Http\Controllers\HomeController')->Index();
                break;
            case "blogs":
               return view('users.pages.news')->with('news', Blog::latest()->get())
               ->with('recent', Blog::latest()->take(5)->get());
            break;
            case "about": 
                return view('users.pages.about')->with('news', News::latest()->get());
             break;
            case "contacts":
                return view('users.pages.contact') 
                ->with('contact', ContactUs::latest()->first())->with('news', Blog::latest()->get());
                break;

                case "services":
                return view('users.pages.services') 
                ->with('services', Services::latest()->first())->with('news', Blog::latest()->get());
                break;
            default:
            return view('errors.404'); 
            break;
        }
    }

    // public function newsDetails($id){
    //     return view('users.pages.news-details')
    //     ->with('newss', Blog::where('id', decrypt($id))->first())
    //     ->with('news',  Blog::latest()->get())
    //     ->with('recent', Blog::latest()->take(5)->get());
    // }


    // public function privacypolicy(){
    //     $privacypolicy = Privacypolicy::first();
    //     return  view('users.pages.privacy-policy')
    //     ->with('privacypolicy', $privacypolicy)
    //     ->with('bheading', 'privacy-policy')
    //     ->with('breadcrumb', 'privacy-policy');
    // }

    // public function Terms(){
    //     $termscondition = TermsCondition::first();
    //     return  view('users.pages..termsConditions')
    //     ->with('termscondition', $termscondition)
    //     ->with('bheading', 'Edit Menu')
    //     ->with('breadcrumb', 'Edit Menu');
    // }


    public function about(){
        return  view('users.pages.about-us');
    }


}
