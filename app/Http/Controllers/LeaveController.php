<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Leaves;

use App\Models\User;

use Auth,URL,Session;
Use App\Models\LeaveTypes;
Use App\Models\LeaveCircles;


class LeaveController extends Controller

{

    public function index(){
       $leaves = Leaves::all();

       foreach($leaves as $val){
           $val->DayPart = LeaveTypes::where('id',$val->type)->pluck('name')->first();;
           $val->subType = LeaveCircles::where('id',$val->leave_cir_id)->pluck('name')->first();;
       }
        return view('leave.index',compact('leaves'));

    }

    public function listing(){

        return view('leave.listing');

    }

    public function add_form(){
        $leave_type = LeaveTypes::all();
        return view('leave.add_form',compact('leave_type'));

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

        $leave->description = $request->description;

        if(!$request->leave_cir_id){
            $leave->leave_cir_id = 0;
        }else{
            $leave->leave_cir_id = $request->leave_cir_id;
        }
        if($leave->save()){
            Session::flash('success', 'Leave apply success');
            return redirect()->route('leave.users');

        }else{

            Session::flash('success', 'Leave apply Failed');
            return redirect()->route('leave.users');

        }

    }

    public function cancel($id){
        $leave = Leaves::find($id);
        $leave->delete();
        return response()->json(['status'=>200,'success'=>true]);
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


    public function leave_sub_type($id){
//        echo "hello";
        $request = LeaveCircles::where('laeve_type_id',$id)->get();
//        dd($request)
//        $leave_sub_type = LeaveCircles::where('laeve_type_id',$request->$id)->get();
        return response()->json(['status'=>200,'success'=>true,'data'=>$request]);
    }




}

