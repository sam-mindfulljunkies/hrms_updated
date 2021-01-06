<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Models\User;

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

        $user =  User::where('role_id',2)->get();
        foreach($user as $key => $val){
            $user[$key]['reports'] = Reports::where('user_id',$val->id)->where('date',$date)->get(); 
        }
        // echo "<pre>";
        // // print_r($user[0]['reports']);
        // exit;
        return view('report.renderuserdiv',compact('user'))->render();
    }
    public function getuserDetailedReportById($report_id){
        $report = Reports::where('id',$report_id)->first();
    }
}
