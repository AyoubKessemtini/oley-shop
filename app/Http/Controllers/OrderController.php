<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        return view('order')
        ->with('user',Auth::user())
        ->with('cart',Cart::with('product')->where('user_id',Auth::id())->where('ordered',false)->get())
        ->with('cartqte',Cart::where('user_id',Auth::id())->where('ordered',false)->get()->count());
    }

    public function order(Request $request){
        $order=new Order();
        $order->user_id=Auth::id();
        $order->cart_id=Cart::where('user_id',Auth::id())->first()->id;
        $order->address=$request->address;
        $order->address2=$request->address2;
        $order->phone=$request->phone;
        $order->country=$request->country;
        $order->state=$request->state;
        $order->zip=$request->zip;
        $order->save();
        $cart=Cart::where('user_id',Auth::id())->where('checkedout',false)->where('ordered',false)->get();
        foreach($cart as $product){
            $product->ordered=true;
            $product->save();
        } 
        
        return redirect()->route('cart')->with('ordered','Your cart has been ordered successfully!!');
    }
}
