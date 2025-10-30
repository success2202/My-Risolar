<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\Session;
use App\Models\Blog;
use Vinkla\Hashids\Facades\Hashids;

class BlogController extends Controller
{
    use imageUpload;
    public function Index(){
        $blogs = Blog::latest()->simplePaginate(100);
        foreach($blogs as $blog){
            $blog->hashid = Hashids::connection('products')->encode($blog->id);
        }
        return view('manage.blog.index')
        ->with('bheading', 'Blog Index')
        ->with('breadcrumb', 'Index')
        ->with('blogs', $blogs);
    }

    public function Create(){
        return view('manage.blog.create')
        ->with('bheading', 'Create Blog')
        ->with('breadcrumb', 'Create Blog');
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
       $Blog = new Blog;
       $Blog->title = $request->title;
       $Blog->content = $request->content;
       if($request->file('image')){
        //$image =  $this->UploadImage($request, 'images/blogs/',400,300);
        $uploadedFile = $request->file('image');
         $destinationPath = public_path('images/blog'); 
             $fileName = time() . '-' . $uploadedFile->getClientOriginalName(); 
            $uploadedFile->move($destinationPath, $fileName); 
             $Blog->image =  $fileName;
       }
       if($Blog->save()){
       Session::flash('alert', 'success');
       Session::flash('message','Blog added Successfully');
       return back();
    }
        Session::flash('alert', 'error');
       Session::flash('message','Request Failed, something went wrong');
       return back();
    }

    public function Edit($id){
        $id = Hashids::connection('products')->decode($id);
        $blogs = Blog::where('id', $id)->first();
        $blogs->hashid = Hashids::connection('products')->encode($id);

        return view('manage.blog.edit')
        ->with('bheading', 'Edit Blog')
        ->with('breadcrumb', 'Edit Blog')
        ->with('blog', $blogs);
    }

    public function Update(Request $request, $id){
        $id = Hashids::connection('products')->decode($id);
        $Blog =  Blog::where('id', $id)->first();
        $Blog->title = $request->title;
        $Blog->content = $request->content;
        if($request->file('image')){
            //$image =  $this->UploadImage($request, 'images/blogs/', 400,300);
            $uploadedFile = $request->file('image');
            $destinationPath = public_path('images/blog');
             $fileName = time() . '-' . $uploadedFile->getClientOriginalName(); 
            $uploadedFile->move($destinationPath, $fileName); 
            
             $Blog->image =  $fileName;
           }
        if($Blog->save()){
        Session::flash('alert', 'success');
        Session::flash('message','Blog Updated Successfully');
        return back();
     }
        Session::flash('alert', 'error');
        Session::flash('message','Request Failed, something went wrong');
        return back();
    }

    public function Delete($id){
        $id = Hashids::connection('products')->decode($id);
        $blog = Blog::whereId($id);
        $blog->delete();
        Session::flash('alert', 'error');
        Session::flash('message', 'Blog Deleted Successfully');
            return redirect()->back();
        }
        
}
