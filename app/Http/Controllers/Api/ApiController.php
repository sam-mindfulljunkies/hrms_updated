<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth,Hash;
use App\Models\User;
use App\Models\Reports;
use App\Models\Notifications;

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
            echo json_encode(['status'=>412,'msg'=>'false']);
            exit;
        }
        echo json_encode(['status'=>412,'msg'=>'false']);
    }

    public function report(Request $request){
        if($request->date == null){
            $date = date('Y-m-d');
        }else{
            $date = $request->date;
        }
        $report = Reports::where('created_at',$date)->get();
        if(isset($report)){
            echo json_encode(['status'=>200,'msg'=>'success','report_data'=>$report]);
            exit;
        }else{
            echo json_encode(['status'=>412,'msg'=>'Sorry No Data Found']);
            exit;
        } 
    }
    public function notifications(Request $request){
        if(isset($request->api_token)){
            $user =  User::where('api_token',$request->api_token)->first(); 
        }
        if(isset($user)){
            $notifications = Notifications::where('to',$user->id)->get();
        }
        if(isset($notifications)){
            echo json_encode(['status'=>200,'msg'=>'success','report_data'=>$notifications]);
            exit;
        }else{
            echo json_encode(['status'=>412,'msg'=>'something went wrong']);
            exit;
        }
    }
}
