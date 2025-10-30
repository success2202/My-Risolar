<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Facade\FlareClient\View;
use stdClass;
use Vinkla\Hashids\Facades\Hashids;

class SearchController extends Controller
{

    public function __invoke(Request $request, $id=null, $products = [], $data = [])
    {  
        if(isset($id)){
            $cat = Category::findOrFail(decodeHashid($id));
        }
        if(isset($request->q)){
            $products = Product::where('name', 'LIKE', "%$request->q%")->orWhere('description', 'LIKE', "%$request->q%")->simplePaginate(18);
            $data['searchterm'] = "Showing Results for ".$request->q;
            addHashId($products);
        }elseif(isset($id)){
            $products = Product::where('category_id', decodeHashid($id))->get();
            $data['searchterm'] = "Showing Results for ".ucfirst(strtolower($cat->name));
            addHashId($products);
        }else{
            $products = Product::latest()->take(20)->get();
            addHashId($products);
        }
        $categories = Category::latest()->get();
        foreach($categories as $cats){
            addHashId($cats->products);
        }
        addHashId($categories);
        return view('users.pages.products',$data, [
            'products' => $products,
            'categories' => $categories,
        ])
        ->with('metaTitle', Str::slug($cat->name??' ', ' '). ' | Sanlive Pharmacy: Online Pharmacy in Nigeria')
        ->with('ogTitle', Str::slug($cat->name?? '', ' ') . ' | Sanlive Pharmacy: Online Pharmacy in Nigeria')
        ->with('twitterTitle', Str::slug($cat->name?? '', '') .' | Sanlive Pharmacy: Online Pharmacy in Nigeria');
    }
}
