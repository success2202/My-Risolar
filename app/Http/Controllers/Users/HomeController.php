<?php

namespace App\Http\Controllers\Users;

use Carbon\Carbon;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\CountryCurrency;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function __invoke(Request $request)
    {
        // getCountryCurrency();

    //     $ss =   getUserLocationData();
    //   $sss =   updateExchangeRate();
    //   $data = CountryCurrency::pluck('currency');
    //   $data =  $data->toArray();
    //   foreach($sss['conversion_rates'] as $rates => $value)
    //   {
    //     if(in_array($rates, $data))
    //     {
    //         $currency = CountryCurrency::where('currency', $rates)->first();
    //         $currency->update(['exchange_rate' => $value, 'last_updated' => Carbon::now()]);
    //     }
    //   }
    
        // $site_menu = Menu::latest()->get();
        $slider = Slider::latest()->get();
        $category = Category::latest()->simplePaginate(10);
        $product = Product::latest()->simplePaginate(9);
        $services = Services::latest()->simplePaginate(5);
         $services->transform(function ($service) {
        $service->short_description = \Str::words($service->contents, 10, '...'); 
        return $service;
    });
        $data['latest'] = Product::latest()->inRandomOrder()->take(6)->get();
        $data['topProducts1'] = Product::orderBy('views', 'DESC')->take(6)->get();
        $data['productCat1'] = Product::where('category_id', 24)->inRandomOrder()->take(9)->get();
        $data['productCat2'] = Product::where('category_id', 3)->inRandomOrder()->take(9)->get();
        $data['productCat3'] = Product::where('category_id', 1)->inRandomOrder()->take(9)->get();
        $data['productCat4'] = Product::where('category_id', 4)->inRandomOrder()->take(9)->get();
        $data['advert'] = Product::inRandomOrder()->take(3)->get();
        addHashId($data['latest']);
        addHashId($data['topProducts1']);
        addHashId( $data['productCat1']);
        addHashId( $data['productCat2']);
        addHashId( $data['productCat3']);
        addHashId( $data['productCat4']);
        addHashId($data['advert']);
        return view('users.dashboard', $data, [
            'sliders' => $slider,
            // 'site_menu' => $site_menu,
            'categories' => $category,
            'products' => $product,
            'service' => $services,
            
        ]);
    }

    public function Index(){
        // $site_menu = Menu::get();
        $slider = Slider::latest()->get();
        $category = Category::latest()->simplePaginate(10);
        $product = Product::latest()->simplePaginate(9);
        $services = Services::limit(5)->get();
        return view('users.dashboard')
        ->with('sliders', $slider)
        ->with('categories', $category)
        ->with('service', $services)
        ->with('products', $product);

    }
}
