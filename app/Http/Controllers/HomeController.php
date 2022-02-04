<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::where('status',true)->get();
        return view('home')->with('products',$products)->with('categories',Category::all());
    }

    public function allproductspercategory($category_id){
        $products= Product::where('category_id',$category_id)->get();
            return view('percategory')->with('products',$products)->with('categories',Category::all());
        
    }
    public function perproduct($id){
        $product= Product::find($id);
        return view('perproduct')->with('product',$product)->with('categories',Category::all());
    }
}
