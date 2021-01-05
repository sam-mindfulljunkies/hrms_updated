<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
