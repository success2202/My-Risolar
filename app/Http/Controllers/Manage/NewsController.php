<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    //

    public function Index(){
        return view('manage.news.index')
        ->with('bheading', 'Blog Index')
        ->with('breadcrumb', 'Index')
        ->with('news', Blog::get());
    }

    public function Create(){
        return view('manage.news.create')
        ->with('bheading', 'Create News')
        ->with('breadcrumb', 'Create News');
    }

    public function Store(Request $request){
        $valid = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'images' => 'required',
        ]);
  
        if($valid->fails()){
        Session::flash('alert', 'error');
        Session::flash('message','Some field are missing');
        return back();
        }
       $news = new Blog;
       $news->title = $request->title;
       $news->content = $request->content;
       $news->admin_id = auth('admin')->user()->id;
       if($request->file('image')){
            $image = $request->file('image');
            $ex = $image->getClientOriginalExtension();
            $fileName = time().".".$ex;
            Image::make(request()->file('image'))->resize(500,500)->save('images/news/'.$fileName);
            $news->image = $fileName;
       }
      if($request->file('images')){
        foreach($request->file('images') as $images){
            $ex = $images->getClientOriginalExtension();
            $fileNames = time().".".$ex;
            Image::make($images)->resize(500,500)->save('images/news/'.$fileNames);
            $imageFile[] = $fileNames;
        }
        $dd = json_encode($imageFile);
        $news->images = $dd;
       }
       if($news->save()){
       Session::flash('alert', 'sucess');
       Session::flash('message','News added Successfully');
       return back();
    }
        Session::flash('alert', 'error');
       Session::flash('message','Request Failed, something went wrong');
       return back();
    }

    public function Edit($id){
        return view('manage.news.edit')
        ->with('bheading', 'Edit Menu')
        ->with('breadcrumb', 'Edit Menu')
        ->with('news', Blog::where('id', decrypt($id))->first());
    }

    public function Update(Request $request, $id){
        $news =  Blog::where('id', decrypt($id))->first();
        $news->title = $request->title;
        $news->content = $request->content;
        if($request->file('image')){
             $image = $request->file('image');
             $ex = $image->getClientOriginalExtension();
             $fileName = time().".".$ex;
             Image::make(request()->file('image'))->resize(500,500)->save('images/news/'.$fileName);
             $news->image = $fileName;
        }
       if($request->file('images')){
         foreach($request->file('images') as $images){
             $ex = $images->getClientOriginalExtension();
             $fileNames = time().".".$ex;
             Image::make($images)->save('images/news/'.$fileNames);
             $imageFile[] = $fileNames;
         }
         $dd = json_encode($imageFile);
         $news->images = $dd;
        }
        if($news->save()){
        Session::flash('alert', 'sucess');
        Session::flash('message','News Updated Successfully');
        return back();
     }
        Session::flash('alert', 'error');
        Session::flash('message','Request Failed, something went wrong');
        return back();
    }

    public function status(Request $request, $id){
        
        if($request->status == 1){
        DB::table('blogs')->where('id', decrypt($id))
                    ->update(['status' => 1]);
            Session::flash('alert', 'error');
            Session::flash('message', 'News Disabled successfully');
            return redirect()->back();
        }
        elseif($request->status == 0){       
           DB::table('blogs')->where('id', decrypt($id))
                    ->update(['status' => 0]);
                 Session::flash('alert', 'success');
                Session::flash('message', 'News Enabled successfully');
            return redirect()->back();
        }else{
                 Session::flash('alert', 'error');
                Session::flash('message', 'An errror occured, No changes made');
            return redirect()->back();
        }
        
    
    }
}
