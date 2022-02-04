<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function indexNewcheckout(){
        
        $orders=Order::where('status',false)->get();
        $nbr=$orders->count();
        return view('admin.newcheckout')->with('orders',$orders)->with('nbr',$nbr)->with('user'); 
    }

    public function indexpercheckout($id){
        $cartinfo=Cart::where('user_id',$id)->with('product')->first();
        $orderinfo=Order::where('user_id',$id)->with('user')->first();
        $cart=Cart::where('user_id',$id)->with('product')->where('ordered',true)->where('checkedout',false)->get();
        $totaltopay=0;
        $originalprice=0;
        foreach($cart as $product){
            $totaltopay+=($product->product->price * $product->qte);
        }
        foreach($cart as $product){
            $originalprice+=($product->product->originalPrice * $product->qte);
        }
        return view('admin.percheckout')
        ->with('orderinfo',$orderinfo)
        ->with('cartinfo',$cartinfo)
        ->with('cart',$cart)
        ->with('totaltopay',$totaltopay)
        ->with('totalgain',$totaltopay - $originalprice);
    }

    public function completeorder(Request $request){
        $order=Order::where('user_id',$request->user_id)->where('status',false)->first();
        $cart=Cart::where('user_id',$request->user_id)->where('ordered',true)->where('checkedout',false)->get();
        $order->status=true;
        $order->save();
        foreach($cart as $product){
            $product->checkedout=true;
            $product->save();
        } 
        return redirect()->route('adminindex');
    }

    public function indexallcheckout(){
        $orders=Order::where('status',true)->get();
        $nbr=Order::where('status',true)->get()->count();
        return view('admin.allcheckout')
        ->with('orders',$orders)
        ->with('nbr',$nbr)
        ->with('user')
        ->with('cart');
    }
}
