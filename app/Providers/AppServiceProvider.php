<?php

namespace App\Providers;

use App\Models\Aboutus;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        view()->composer('*', function($view){
            $carts = Session::get('carts');
            if (is_null($carts)) return [];
    
            $productId = array_keys($carts);
            $view->with([
              'aboutus' => Aboutus::all(),
            
             'productss'=> Product::select('id', 'name', 'price', 'price_sale', 'thumb')
             ->where('active', 1)
             ->whereIn('id', $productId)
             ->get(),
            ]);
        });
    }
}
