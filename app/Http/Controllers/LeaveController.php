<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Leaves;

use App\Models\User;

use Auth,URL;



class LeaveController extends Controller

{

    public function index(){

        return view('leave.index');

    }

    public function listing(){

        return view('leave.listing');

    }

    public function add_form(){

        return view('leave.add_form');

    }

    public function getuserleave($date){



        $user =  User::where('role_id',2)->paginate(10);

        foreach($user as $key => $val){

            $user[$key]['leaves'] = Leaves::where('user_id',$val->id)->where('date',$date)->get();

        }

        return view('leave.renderuserdiv',compact('user'))->render();

    }

    public function getUserleaveByuserId($userid){

        $leave = Leaves::where('user_id',$userid)->where('date',date('Y-m-d'))->get();

        return view('leave.users',compact('leave'));

    }

    public function formadd_leave(){

        return view('leave.add_form');

    }

    public function submit_leave(Request $request){

        $leave =  new Leaves();

        $leave->from_date = $request->from_date;

        $leave->user_id = Auth::guard('admin')->user()->id;

        $leave->to_date = $request->to_date;

        $leave->type = $request->type;

        if(!$request->is_first_half){

            $leave->is_first_half = 0;

        }else{

            $leave->is_first_half = $request->is_first_half;

        }

        $leave->save();

    }

    public function cancel($id){

        $leave = Leaves::find($id);
        $leave->delete();
        return redirect()->route('leave.users');

    }

    public function approve($id){
        $leave = Leaves::find($id);
        $leave->status = 1;
        $leave->update();
        return response()->json(['status'=>200,'success'=>true]);
    }
    public function reject($id){
        $leave = Leaves::find($id);
        $leave->status =2;
        $leave->update();
        return response()->json(['status'=>200,'success'=>true]);
    }

    public function listing_Admin(){
        $leaves = Leaves::where('status',0)->get();
        return view('leave.listing_admin',compact('leaves'));
    }

}

