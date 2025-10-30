<?php

namespace App\Providers;

use App\Interfaces\paymentInterface;
use App\Models\AdminNotification;
use App\Models\Advert;
use App\Models\Annoucement;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Notification;
use App\Services\paymentServices;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Vinkla\Hashids\Facades\Hashids;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(paymentInterface::class, paymentServices::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     
        View::share('announcment', Annoucement::latest()->first());
        View::share('settings', Setting::latest()->first());
        View::share('site_menu', Menu::get());
        View::share('advert_top', Advert::where('placement', 'top')->first());
        View::share('unread_notify', AdminNotification::latest()->get());
        $categories = Category::inRandomOrder()->get();
        foreach($categories as $cat){
            addHashId($cat->products);
            $cat->hashid = Hashids::connection('products')->encode($cat->id);
        }
        View::share('site_categories', $categories);
        }
}
