<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

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
    public function submit_user(Request $request){
        $user =  new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        $user->role_id = $request->role_id;
        $user->pincode = $request->pincode;
        $user->gender = $request->gender;
        $user->contact = $request->contact;
        $user->bank_name = $request->bank_name;
        $user->ifsc = $request->ifsc;
        $user->salary = $request->salary;
        $user->account_no = $request->account_no;
        $user->save();
        return json_encode(['status'=>200]);
    }
    public function edit($user_id){
        $user =  User::find($user_id);
        return view('user.edit_form',compact('user'));
    }
    public function update(Request $request){
        $user =  User::find($request->user_id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        $user->role_id = $request->role_id;
        $user->pincode = $request->pincode;
        $user->gender = $request->gender;
        $user->contact = $request->contact;
        $user->bank_name = $request->bank_name;
        $user->ifsc = $request->ifsc;
        $user->salary = $request->salary;
        $user->account_no = $request->account_no;
        $user->update();
        return json_encode(['status'=>200]);
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users');
    }
    
}