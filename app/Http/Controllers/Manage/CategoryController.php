<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageUpload;
use Vinkla\Hashids\Facades\Hashids;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     use imageUpload;
     public $category;

    public function __construct()
    {
        $this->category = new Category;
    }
    public function index()
    {
        $category = Category::latest()->get();
        addHashId($category);
        return view('manage.category.index')
            ->with('category', $category)
            ->with('bheading', 'Category')
            ->with('breadcrumb', 'Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.category.create')
            ->with('bheading', 'Category')
            ->with('breadcrumb', 'Index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'markup' => 'required|numeric',
                'inflated' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            Session::flash('alert', 'error'); 
            Session::flash('message', $validate->errors()->first());

            return redirect()->back()->withErrors($validate)->withInput($request->all())
                ->with('bheading', 'Category')
                ->with('breadcrumb', 'Index');
        }

        if ($request->file('image')) {
            $fileName = $this->UploadImage($request, 'images/category/');
        }
        //  dd($fileName);
        $data = [
            'name' => $request->name,
            'image_path' => $fileName,
            'markup' => $request->markup,
            'inflated' => $request->inflated,
        ];
        $category =  $this->category->create($data);
        if ($category) {
            Session::flash('alert', 'success');
            Session::flash('message', 'Category Added Successfully');
            return redirect()->back()
                ->with('bheading', 'Category')
                ->with('breadcrumb', 'Index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =  Hashids::connection('products')->decode($id);
        $cat = Category::where('id', $id[0])->first();
        $cat->hashid = Hashids::connection('products')->encode($id);
        return view('manage.category.edit')
            ->with('bheading', 'Category')
            ->with('category',   $cat)
            ->with('breadcrumb', 'Edit Catogry');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(),[
                'markup' => 'required|numeric',
                'inflated' => 'required|numeric'
        ]);
        if($valid->fails()){
            Session::flash('alert', 'error');
            Session::flash('message', $valid->errors()->first());  
        }
        $id = Hashids::connection('products')->decode($id);
        $category = category::where('id', $id)->first();
        $category->name = $request->name;

        $category->markup = $request->markup;
        $category->inflated = $request->inflated;
        if($request->file('image')){
            $category->image_path = $this->UploadImage($request, 'images/category/',400, 400);
        }else{
            $category->image_path =  $category->image;  
        }
        if($category->save()){
            Session::flash('alert', 'success');
            Session::flash('message', 'Category Added Successfully');
            return redirect()->back()
                ->with('bheading', 'Category')
                ->with('breadcrumb', 'Index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
