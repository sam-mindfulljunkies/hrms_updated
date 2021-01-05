<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

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
    public function getuserReport($id){
        $user = Reports::where('user_id',$id)->orderBy('date','desc')->get();
        return view('report.renderuserdiv',compact('user'))->render();
    }
    public function getuserDetailedReportById($report_id){
        $detailed_Report = Reports::
        $report = Reports::where('id',$report_id)->first();
        // $product = Product::where('mall_' . $this->mall_id, '=', 1)
    
    // ->find($key);
    }
}
