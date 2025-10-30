<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Session;
class FaqController extends Controller
{
    //
    public function Index(){
        $faq = Faq::first();
        return view('manage.faq.index')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('faq',  $faq);
    }

    public function Create(){
        $faq = Faq::first();
        return view('manage.faq.create')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('faq',  $faq);
    }

    public function Store(Request $request){
        $data = [
            'content' => $request->content,
        ];
    
        $record = Faq::firstOrCreate($data);
    
        Session::flash('alert', 'success');
        Session::flash('message', 'Faq created Successfully');
        return back();
    }

    public function Edit($id){
        $faq = Faq::where('id', decrypt($id))->first();
        return view('manage.faq.edit')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('faq',  $faq);
    }

    public function Update(Request $request, $id)
    {
       
        $faq = Faq::where('id', decrypt($id))->first();
        $faq->content = $request->content;
        $faq->save();
        Session::flash('alert', 'success');
        Session::flash('message', 'Faq updated Successfully');
        return redirect()->back();
    }

    public function Delete($id){
        $record = Faq::where('id', decrypt($id))->first();
        if($record){
            $record->delete();
            Session::flash('alert', 'error');
            Session::flash('alert', 'Record Deleted Successfully');
            return back();
        }
        Session::flash('alert', 'error');
        Session::flash('alert', 'Somthing went wrong');
        return back();
    }


}
