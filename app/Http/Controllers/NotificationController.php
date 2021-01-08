<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications,Auth;

class NotificationController extends Controller
{
    public function lisiting_admin(){
        $notification =  Notifications::where('from',Auth::guard('admin')->user()->id)->get();
        return view('notification.index',compact('notification'));
    }
    public function lisiting(){
        $notification =  Notifications::where('to',Auth::guard('admin')->user()->id);
        return view('notification.index',compact('notification'));
    }
    public function add_form(){
        return view('notification.add_form');
    }

    public function index(){
        return error(404);
    }
}
