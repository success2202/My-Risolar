<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageUpload;

class SliderController extends Controller
{
    //
    use imageUpload;

    public function Index(){
        return view('manage.settings.sliders', [
            'sliders' => Slider::latest()->get()
        ])
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings');
    }


    public function Create(){
    return view('manage.settings.create_sliders')
    ->with('bheading', 'Website Settings')
    ->with('breadcrumb', 'Website Settings');
    }
    public function Store(Request $request){
        $request->validate([
            'image' => 'required',
        ]);

       

       //dd(request()->file('images'));
          $fileName = '';
        if($request->file('image')){
           $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name = pathinfo($image, PATHINFO_FILENAME);
            $fileName = $name.time().'.'.$ext;
            $image->move('images/sliders/',$fileName);
    }
        $data = [
            'image_path' =>   $fileName,
            // 'title' => $request->title,
            // 'content' =>  $request->content,
            // 'link' => 1,
        ];

       //dd($data);
       $ff = Slider::create($data);
        // dd($ff);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Slider Added Successfully');
        return back();
    }



    public function Edit($id){
        $slider = Slider::where('id', decrypt($id))->first();
        return view('manage.settings.edit_sliders',['slider'  => $slider ])
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings');
    }

    public function Update(Request $request, $id){

        $sl = Slider::where('id', decrypt($id))->first();
        
        if($request->file('image')){
            //  $fileName = $this->ImagesNoResize($request, 'images/sliders');
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name = pathinfo($image, PATHINFO_FILENAME);
            $fileName = $name.time().'.'.$ext;
            $image->move('images/sliders/',$fileName);
    }else{
        $fileName = $sl->image_path;
    }
    $data = [
        'image_path' =>   $fileName,
        'title' => $request->title,
        'content' =>  $request->content,
        'link' => 1,
    ];
         $sl->fill($data)->save();
        Session::flash('alert', 'success');
        Session::flash('msg', 'Slider Updated Successfully');
        return back();
    }

    public function Delete($id){
        $slider = Slider::where('id', decrypt($id))->first();
        if($slider){
            $slider->delete();
            Session::flash('alert', 'error');
            Session::flash('msg', 'Slider Deleted Successfully');
            return back();
        }
        Session::flash('alert', 'error');
        Session::flash('alert', 'Somthing went wrong');
        return back();
    }

    public function Activate($id){
        $slid = Slider::where('id', decrypt($id))->first();
        $slid->update(['status' => 1]);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Slider Activated Successfully');
        return back();
    }
    
    public function Deactivate($id){
        $slid = Slider::where('id', decrypt($id))->first();
        $slid->update(['status' => 0]);
        Session::flash('alert', 'error');
        Session::flash('msg', 'Slider Deactivated Successfully');
        return back();
    }
   
}
