<?php

namespace App\Http\Middleware;

use App\Cart;
use Closure;
use Illuminate\Support\Facades\Auth;

class Order
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart=Cart::where('user_id',Auth::id())->first();
        if($cart){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
        
    }
}
