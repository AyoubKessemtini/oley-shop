<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $products=Product::where('description','like', "%{$request->search}%")->orWhere('title',$request->search)->get();
        return view('search')->with('products',$products)->with('search',$request->search);
    }
}
