<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Leaves;

use App\Models\User;

use Auth,URL,Session;
Use App\Models\LeaveTypes;
Use App\Models\LeaveCircles,App\Models\Notifications,DB;


class LeaveController extends Controller

{

    public function index(){
        if(Auth::user()->role_id == 1){
            $leaves = Leaves::all();
        }else{
            $leaves = Leaves::all()->where('user_id',Auth::user()->id);
        }
    
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

        $leave->user_id = Auth::user()->id;

        $leave->to_date = $request->to_date;

        $leave->type = $request->type;

        $leave->description = $request->description;



        //leave differnace

        $start_date = strtotime($request->from_date);
        $end_date = strtotime($request->to_date);

        //apply leave hours
        $diifernce_date = ($end_date - $start_date);
        if($start_date  == $end_date)
        $diifernce_date = 1;
        
        //convert hours to date
        $days = $diifernce_date / (60 * 60 * 24);


        // working hours convert to strtotime
        $working_hours = 8;


        //apply leave hours
        $apply_leave_hours = $days * $working_hours;
        $leave->hours = $apply_leave_hours;
        $leave->days = $days;
        //pending leave hours
        $pending_leave = $working_hours - $diifernce_date;




//        dd($diifernce_date);



        if(!$request->leave_cir_id){
            $leave->leave_cir_id = 0;
            if($diifernce_date == 0){
                $apply_leave_hours = $working_hours;
                $days = 1;
                $leave->hours = $apply_leave_hours;
                $leave->days = $days;

            }

        }else{
            $leave->leave_cir_id = $request->leave_cir_id;
            if($diifernce_date == 0 ){
                $hours = LeaveTypes::where('id',$request->type)->first();
                $apply_leave_hours = $hours['hours'];
                $days = 0;
                $leave->hours = $apply_leave_hours;
                $leave->days = $days;

            }

        }
        if($leave->save()){
            $admin = DB::select('select * from users where role_id = 1', [1]);
            $notification = new Notifications();
            $notification->from =  Auth::user()->id;
            $notification->to = $admin[0]->id;
            
            $notification->subject = "Applied leaved";
            $notification->description = Auth::user()->username."Added Leave on Date : ". $request->from_date;
            // $notification->extra = Auth::user()->username."Added Leave on Date : ". $request->from_date;
            $notification->hide = 0;
            $notification->save();
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
        $leave = Leaves::find($id);
        $user = DB::select("select * from leaves where id = $id", [1]);    
        $leave->delete();
        $notification = new Notifications();
            $notification->from =  Auth::user()->id;
            $notification->to = $user[0]->id;
            $notification->subject = "Approve Leave Request";
            $notification->description = Auth::user()->username."Approved on Date : ". $request->from_date;
            // $notification->extra = Auth::user()->username."Added Leave on Date : ". $request->from_date;
            $notification->hide = 0;
            $notification->save();
        return response()->json(['status'=>200,'success'=>true]);
    }
    public function reject($id){
        $leave = Leaves::find($id);
        $leave->status =2;
        $leave->update();

        $user = DB::select("select * from leaves where id = $id", [1]);
            $notification = new Notifications();
            $notification->from =  Auth::user()->id;
            $notification->to = $user[0]->to;
            
            $notification->subject = "Rejection of Leave";
            $notification->description = Auth::user()->username."Rejected on Date : ". $request->from_date;
            // $notification->extra = Auth::user()->username."Added Leave on Date : ". $request->from_date;
            $notification->hide = 0;
            $notification->save();
        return response()->json(['status'=>200,'success'=>true]);
    }

    public function listing_Admin(){
        $leaves = Leaves::where('status',0)->get();
        return view('leave.listing_admin',compact('leaves'));
    }


    public function leave_sub_type($id){
        $request = LeaveCircles::where('laeve_type_id',$id)->get();
        return response()->json(['status'=>200,'success'=>true,'data'=>$request]);
    }




}

