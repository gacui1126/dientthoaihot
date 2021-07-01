<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use Session;
use App\Role;
use App\User;
use Auth;
use URL;

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
        // URL::forceScheme('https');
        view()->composer('header',function($view){
            $product_type = ProductType::all();
            if(Auth::check()){
                $name = Auth::user()->roles;
                foreach($name as $n){
                    $na = $n->name;
                }
            }else{
                $na = '';
            }
            $view->with(['product_type'=>$product_type , 'na'=>$na]);
        });

        view()->composer('header',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty ]);
            }
        });
    }
}
