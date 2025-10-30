<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Services;
use Vinkla\Hashids\Facades\Hashids;
class ServiceController extends Controller
{

 use imageUpload;
    public function Index(){
        $Services = Services::paginate(10);
        foreach($Services as $Service){
            $Service->hashid = Hashids::connection('products')->encode($Service->id);
        }
        return view('manage.service.index')
        ->with('bheading', 'Service Index')
        ->with('breadcrumb', 'Index')
        ->with('Services', $Services);
    }



     public function Create(){
        return view('manage.service.create')
        ->with('bheading', 'Create Service')
        ->with('breadcrumb', 'Create Service');
    }


    public function Store(Request $request){
        $valid = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]); 
  
        if($valid->fails()){
        Session::flash('alert', 'error');
        Session::flash('message','Some field are missing');
        return back()->withInput($request->all());
        }
       $Service = new Services;
       $Service->title = $request->title;
       $Service->contents = $request->content;
       if($request->file('image')){
        //$image =  $this->UploadImage($request, 'images/blogs/',400,300);
        $uploadedFile = $request->file('image');
         $destinationPath = public_path('images/services'); 
             $fileName = time() . '-' . $uploadedFile->getClientOriginalName(); 
            $uploadedFile->move($destinationPath, $fileName); 
             $Service->images =  $fileName;
       }
       if($Service->save()){
       Session::flash('alert', 'success');
       Session::flash('message','Service added Successfully');
       return back();
    }
        Session::flash('alert', 'error');
       Session::flash('message','Request Failed, something went wrong');
       return back();
    }



    public function Edit($id){
        $id = Hashids::connection('products')->decode($id);
        $Services = Services::where('id', $id)->first();
        $Services->hashid = Hashids::connection('products')->encode($id);

        return view('manage.service.edit')
        ->with('bheading', 'Edit service')
        ->with('breadcrumb', 'Edit service')
        ->with('service', $Services);
    }

    public function Update(Request $request, $id){
        $id = Hashids::connection('products')->decode($id);
        $Service =  Services::where('id', $id)->first();
        $Service->title = $request->title;
        $Service->contents = $request->content;
        if($request->file('image')){
            //$image =  $this->UploadImage($request, 'images/blogs/', 400,300);
            $uploadedFile = $request->file('image');
            $destinationPath = public_path('images/services');
             $fileName = time() . '-' . $uploadedFile->getClientOriginalName(); 
            $uploadedFile->move($destinationPath, $fileName); 
            
             $Service->images =  $fileName;
           }
        if($Service->save()){
        Session::flash('alert', 'success');
        Session::flash('message','Service Updated Successfully');
        return back();
     }
        Session::flash('alert', 'error');
        Session::flash('message','Request Failed, something went wrong');
        return back();
    }

    public function Delete($id){
        $id = Hashids::connection('products')->decode($id);
        $Service = Services::whereId($id);
        $Service->delete();
        Session::flash('alert', 'error');
        Session::flash('message', 'Service Deleted Successfully');
            return redirect()->back();
        }
}
