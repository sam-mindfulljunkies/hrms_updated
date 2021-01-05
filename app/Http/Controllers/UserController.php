<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function listing(){
        return view('user.listing');
    }
    public function add_form(){
        return view('user.add_form');
    }
}
