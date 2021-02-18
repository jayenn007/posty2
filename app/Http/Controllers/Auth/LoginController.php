<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        return view('auth.login');
    }

    public function signin(Request $request){
        //dd($request);
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        if (!Auth::attempt($request->only('email', 'password'))){
                return back()->with('status', 'invalid login details');

        }
            

        return redirect()->route('dashboard');

    }
}