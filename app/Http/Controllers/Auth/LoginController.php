<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    
    public function __construct(){

        $this->middleware(['guest']);
        
    }
    
    
    public function index(){

        return view('auth.login');
    }


    public function signin(Request $request){
        //dd($request->remember);

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        if (!Auth::attempt($request->only('email', 'password'), $request->remember)){
                return back()->with('status', 'invalid login details');

        }
            

        return redirect()->route('dashboard');

    }
}
