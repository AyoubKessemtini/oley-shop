<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index(){
        return view('profile')
        ->with('user',Auth::user())
        ->with('cartnbr',Cart::where('user_id',Auth::id())->where('ordered',false)->count());
    }
    public function changepassword(Request $request){
        $yesmsg='';
        $nomsg='';
        $user=User::find(Auth::id());
        if(Hash::check($request->oldpassword,$user->password) AND ($request->newpassword == $request->confirmnewpassword)){
            $user->password=Hash::make($request->newpassword);
            $user->save();
            $yesmsg='Password changed!!';
        }else{
            if(Hash::check($request->oldpassword,$user->password) != $user->password)
                $nomsg='Wrong password!!';
            else if($request->newpassword != $request->confirmnewpassword)
                $nomsg='Please verify your new password!!';     
        }
        
        return redirect()->back()->with('yesmsg',$yesmsg)->with('nomsg',$nomsg);
        
    }

}

/*

*/