<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'fistName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {   
        
        
        $existuser= User::where('email',$request->email)->first();
        if($existuser){
            return redirect()->back()->with('msg','User exists');
        }else{
            $role=false;
            if($request->email=='ayoub.study001@gmail.com' || $request->email=='ayoubbusiness001@gmail.com')
                $role=true;
            $user=new User();
            $user->firstName=$request->firstName;
            $user->lastName=$request->lastName;
            $user->email=$request->email;
            $user->role=$role;
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route('login');
        }
    }
}

/*
                User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'role'=>$role,
            'password' => Hash::make($request->password),
        ]);
*/