<?php

namespace App\Http\Controllers;

use App\Models\NewAddedLeaves;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class CronController extends Controller
{
    function index(){
        //get user leaves

//        $leaves= NewAddedLeaves::all();
       $leaves=  DB::table('new_added_leaves')
            ->select('new_added_leaves.user_id', DB::raw('SUM(new_added_leaves.hours) AS total_hours'),DB::raw('SUM(new_added_leaves.leaves) AS total_days'))
             ->groupBy('new_added_leaves.user_id')
            ->get();
//       dd($leaves);
       $users = User::all();


       $max_leave = 6;
        if(is_array($leaves) && count($leaves)!=0){
            foreach ($leaves as $keys => $value){
//           dump($value);
                if($value->total_days < $max_leave){
                    $user =  NewAddedLeaves::find($value->user_id);
//               $user->user_id = $value->user_id;
                    $user->leaves = $user->leaves+1;
                    $user->hours = $user->hours+8;
                    $user->update();

                }
            }
        }else{

        }


    }

}
