<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth,Hash;
use App\Models\User;

class ApiController extends Controller
{
    public function login(Request $request){
        $credentails = array('email'=>$request->email,'password'=>$request->password);

        if(Auth::attempt($credentails)){
            $user =  Auth::user();
            $user->api_token = Str::random(40);
            $user->update();
            echo json_encode(['status'=>200,'msg'=>'success','login_user'=>Auth::user()]);
            exit;
        }else{
            echo json_encode(['status'=>401,'msg'=>'Invalid Login Id or Password']);
            exit;
        }
    }
    public function logout(Request $request){
        $user = User::where('api_token',$request->api_token)->first();
        $user->api_token = Str::random(40);
        if($user->update()){
            echo json_encode(['status'=>200,'msg'=>'successfully logout']);
            exit;
        }else{
            echo json_encode(['status'=>412,'msg'=>'Opps Something went wrong !!!']);
            exit;
        }
        echo json_encode(['status'=>412,'msg'=>'Opps Something went wrong !!!']);
    }
    public function Register(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->api_token = Str::random(40);
        if($user->save()){
            echo json_encode(['status'=>200,'msg'=>'success']);
            exit;
        }else{
            echo json_encode(['status'=>412,'msg'=>'Opps Something went wrong !!!']);
            exit;
        }
        echo json_encode(['status'=>412,'msg'=>'Opps Something went wrong !!!']);
    }
}
