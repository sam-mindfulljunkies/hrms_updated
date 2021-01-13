<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications,Auth,App\Models\User;
use DB;
class NotificationController extends Controller
{
    public function lisiting_admin(){
        $notification =  Notifications::where('from',Auth::guard('admin')->user()->id)->get();
        foreach($notification as $key => $val){
            $notification[$key]['date'] = date('Y-m-d',strtotime($val->created_at));
            $notification[$key]['time'] = date('h:i a',strtotime($val->created_at));
        }
        // dd($notification);
        return view('notification.index',compact('notification'));
    }
    public function listing(){
        $user = Auth::guard('admin')->user()->id;
        $notification =  Notifications::where('to',$user)->orderBY('id','desc')->get();
        return view('notification.userindex',compact('notification'));
    }

    public function add_form(){
        return view('notification.add_form');
    }

    public function index(){
        return error(404);
    }
    public function submit_notification(Request $request){
        $users = $request->to;
        $to = implode(",",$users);
        $notification =  new Notifications();
        $notification->from = 1;
        $notification->to = $to;
        $notification->subject = $request->subject;
        $notification->description = $request->description;
        $notification->save();
        echo json_encode(['status'=>200]);
    }
}
