<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Leaves;

use Hash,Auth;



class UserController extends Controller

{

    public function index(){
        return view('user.index');

    }

    public function listing(){

        return view('user.listing');

    }

    public function add_form(){

        return view('user.add_form');

    }

    public function submit_user(Request $request){

        

        $user =  new User();

        $user->fname = $request->fname;

        $user->lname = $request->lname;

        $user->username = $request->username;

        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->address = $request->address;

        $user->pincode = $request->pincode;

        $user->role_id = $request->role_id;

        $user->pincode = $request->pincode;

        $user->gender = $request->gender;

        $user->contact = $request->contact;

        $user->bank_name = $request->bank_name;

        $user->ifsc = $request->ifsc;

        $user->salary = $request->salary;

        $user->account_no = $request->account_no;

        if($request->file('aadhar')){

            $addhar = $file->getClientOriginalName();

            $user->aadhar = $addhar; 

        }

        if($request->file('pancard')){

            $pancard = $file->getClientOriginalName();

            $user->pancard = $pancard;

        }

        if($request->file('election')){

            $election = $file->getClientOriginalName();

            $user->election = $election;

        }

        if($request->file('electricity')){

            $electricity = $file->getClientOriginalName();

            $user->electricity = $electricity;

        }

        if($request->file('certificate')){

            $certificate = $file->getClientOriginalName();

            $user->certificate = $certificate;

        }

        if($request->file('passport')){

            $passport = $file->getClientOriginalName();

            $user->passport = $passport;

        }

        if($request->file('licence')){

            $licence = $file->getClientOriginalName();

            $user->licence = $licence;

        }

        $user->save();

        return json_encode(['status'=>200]);

    }

    public function edit($user_id){

        $user =  User::find($user_id);

        return view('user.edit_form',compact('user'));

    }

    public function update(Request $request){

        $user =  User::find($request->user_id);

        $user->fname = $request->fname;

        $user->lname = $request->lname;

        $user->username = $request->username;

        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->address = $request->address;

        $user->pincode = $request->pincode;

        $user->role_id = $request->role_id;

        $user->pincode = $request->pincode;

        $user->gender = $request->gender;

        $user->contact = $request->contact;

        $user->bank_name = $request->bank_name;

        $user->ifsc = $request->ifsc;

        $user->salary = $request->salary;

        $user->account_no = $request->account_no;

        $user->update();

        return json_encode(['status'=>200]);

    }



    public function delete($id){

        $user = User::find($id);

        $user->is_deleted = 1;
        $user->update();
        
        return redirect()->route('users');

    }

        public function user_profile(){
        $user = Auth::guard('admin')->user();
        return view('user.profile',compact('user'));
    }

    public function get_leaves(){
        $casual =  Leaves::where('type',1)->where('user_id',Auth::guard('admin')->user()->id)->count();
    
        $floating =  Leaves::where('type',3)->where('user_id',Auth::guard('admin')->user()->id)->count();
        $medical =  Leaves::where('type',2)->where('user_id',Auth::guard('admin')->user()->id)->count();
        // dd($casual);
        $user['casual'] = (12 - $casual);  // total 12 
        $user['floating'] = (2 - $floating); //total 2
        $user['medical'] = (5 - $medical); // total 5
        return  $user;
    }


    

}

