<?php

namespace App\Providers;

use App\Cart;
use App\Order;
use App\Category;
use App\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        view()->composer(
            'authlayouts.app',
            function ($view) {
                $view->with('categories', Category::all());
            }
        );
        view()->composer(
            'layouts.app',
            function ($view) {
                $view->with('categories', Category::all());
            }
        );
        view()->composer(
            'layouts.app',
            function ($view) {
                $view->with('auth',Auth::check());
            }
        );
        view()->composer(
            'authlayouts.app',
            function ($view) {
                if(Auth::user()){
                    $auth=true;
                }else{
                    $auth=false;
                }
                $view->with('auth',$auth);
            }
        );
        view()->composer('admin.layouts.app', function ($view) {
            $view->with('categories', Category::all())
            ->with('nbrproducts',Product::count())
            ->with('nbrcategories',Category::count());
        });
        view()->composer(
            'layouts.app',
            function ($view) {
                if(Auth::user() && Auth::user()->role==true){
                    $admin=true;
                }else{
                    $admin=false;
                }
                $view->with('admin',$admin);
            }
        );
        view()->composer(
            'cart',
            function ($view) {
                $cart=Cart::with('product')->where('user_id',Auth::id())->where('ordered',false)->get();
                $total=0;
                foreach($cart as $product){
                    $total=$total + ($product->product->price * $product->qte);
                }
                $view->with('total',$total);
            }
        );
        view()->composer(
            'order',
            function ($view) {
                $cart=Cart::with('product')->where('user_id',Auth::id())->where('ordered',false)->get();
                $total=0;
                foreach($cart as $product){
                    $total=$total + ($product->product->price * $product->qte);
                }
                $view->with('total',$total);
            }
        );
        view()->composer(
            'admin.layouts.app',
            function ($view) {
                $view->with('nbrnewcheckouts',Order::where('status',false)->get()->count());
            }
        );
        view()->composer(
            'admin.layouts.app',
            function ($view) {
                $view->with('nbrallcheckouts',Order::where('status',true)->get()->count());
            }
        );
    }
}
