<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;

class ProductDetailsController extends Controller
{
    //

    public function __invoke($id, $url)
    {
      $ss =   Hashids::connection('products')->decode($id);
      $product = Product::findorfail($ss[0]);
      // $cat = Category::find($id);
      session()->push('products.recently_viewed', $product->getKey());
      $data['latest'] = Product::where('category_id', $product->category->id)->take(10)->get();
      $product->hashid = Hashids::connection('products')->encode($product->id);
      $product->productUrl =  trimInput($product->name);
      $data['product'] = $product;
      $products = session()->get('products.recently_viewed');
      $datas = array_slice(array_unique($products), -5, 5, true);
      $data['recent'] = Product::whereIn('id', $datas)->take(5)->get();
     
      foreach($data['latest']  as $prod){
        $prod->hashid = Hashids::connection('products')->encode($prod->id);
        $prod->productUrl =  trimInput($prod->name);
      }
      return view('users.carts.products', $data)
       ->with('metaTitle', Str::slug($product->name))
      ->with('metaDescription', Str::slug($product->description, ' '))
      ->with('ogTitle', Str::slug($product->name, ' '))
      ->with('ogDescription', Str::slug($product->description, ''))
      ->with('ogImage',asset('images/products/'.$product->image_path))
      ->with('twitterTitle', Str::slug($product->name, ''))
      ->with('twitterDescription', Str::slug($product->description, ' '))
      ->with('twitterImage', asset('images/products/'.$product->image_path));

    }
}
