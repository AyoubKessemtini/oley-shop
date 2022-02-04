<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(){
        $cart=Cart::where('user_id',Auth::id())->where('ordered',false)->get();
        return view('cart')->with('cart',$cart)->with('product')->with('user');//->with('products',Product::all())->with('categories',Category::all());
    }
    public function addtocart(Request $request){
        $existproduct=Cart::where('product_id',$request->product_id)->where('user_id',Auth::id())->where('ordered',false)->first();
        if($existproduct){
            $existproduct->qte += 1;
            $existproduct->save();
            return redirect()->back()->with('added','Added to cart');
        }else{
            $product=new Cart();
            $product->user_id=Auth::id();
            $product->product_id=$request->product_id;
            $product->qte=1;
            $product->save();
            return redirect()->back()->with('added','Added to cart');

        }
    }
    public function addqte(Request $request){
        $product=Cart::where('id',$request->product_id)->where('user_id',Auth::id())->first();
            if($product){
                $product->qte+=1;
                $product->save();
                return redirect()->back();
            }else{
                return "ERROR 404";
            }
        
    }

    public function minqte(Request $request){
        $product=Cart::where('id',$request->product_id)->where('user_id',Auth::id())->first();
            if($product){
                if($product->qte > 1){
                    $product->qte-=1;
                $product->save();
                return redirect()->back();
                }else{
                return redirect()->back();
                }
                
            }else{
                return "ERROR 404";
            }
        
    }
    public function deletecart(Request $request){
        Cart::find($request->product_id)->delete();
        return redirect()->back()->with('msg','Item deleted');
    }
}

/*

*/
