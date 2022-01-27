<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,Session;

class LoginController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
    }

    public function index(){
        return view('login');
    }
    
    public function check_auth(Request $request){
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            return redirect('/dashboard');
        }
        return redirect()->route('home');
    }

    public function dashboard(){
        return view('dashboard');
    }
    
    public function admin_logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    
    public function employee_logout(){
        Auth::logout();
        // Auth::guard('employee')->logout();
        return redirect()->route('home');
    }
}
