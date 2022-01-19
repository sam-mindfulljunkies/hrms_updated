<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Models\User;
use Auth,URL;

class ReportController extends Controller
{
    public function index(){
        return view('report.index');
    }
    public function listing(){
        return view('report.listing');
    }
    public function add_form(){
        return view('report.add_form');
    }
    public function getuserReport($date){

        $user =  User::where('role_id',2)->paginate(10);
        foreach($user as $key => $val){
            $user[$key]['reports'] = Reports::where('user_id',$val->id)->where('date',$date)->get(); 
        }
        return view('report.renderuserdiv',compact('user'))->render();
    }
    // public function getuserDetailedReportById($report_id){
    //     $report = Reports::where('id',$report_id)->first();
    // }
    public function getUserReportByuserId($userid){
        $report = Reports::where('user_id',$userid)->where('date',date('Y-m-d'))->get();
        return view('report.users',compact('report'));
    }
    public function formadd_report(){
        return view('report.add_form');
    }
    public function submit_report(Request $request){

        if($request->file('image')!=null){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('./public/uploads/', $filename);
        }else{
            $filename = "";
        }
        $report =  new Reports();
        $report->date = date('Y-m-d');
        $report->start_time = $request->start_time;
        $report->end_time = $request->end_time;
        $report->hours = $request->hours;
        $report->project = $request->project;
        if($request->file('image')){
            $report->image = $filename;
        }
        $report->time = date('H:i:s');
        $report->user_id = Auth::guard('admin')->user()->id;
        $report->description = $request->description;
        $report->save();
    }
}
