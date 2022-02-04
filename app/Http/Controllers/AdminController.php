<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\User;

class AdminController extends Controller
{
    public function index(){
        //total profit
        $carts=Cart::where('ordered',true)->with('product')->get();
        $totalin=0;
        $totalout=0;
        foreach($carts as $cart){
            $totalin= $totalin + $cart->product->price * $cart->qte;
            $totalout=$totalout + $cart->product->originalPrice * $cart->qte;
        }
        $totalprofit=$totalin - $totalout ;
        // all users
        $totalusers=User::all()->count() - 1;
        // all products
        $totalproducts=Product::all()->count();
        return view('admin.index')
        ->with('categories',Category::all())
        ->with('totalprofit',$totalprofit)
        ->with('totalusers',$totalusers)
        ->with('totalproducts',$totalproducts);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
/*

*/
