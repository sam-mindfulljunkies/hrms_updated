<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Leaves;


use Hash,Auth,Validator,File;



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

        // dd($request->all());

        $validator = Validator::make($request->only(['username', 'email']), [
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>400,'error'=>$validator->errors()]);
        }

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

        if($request->hasFile('aadhar')){
            $file = $request->file('aadhar');
            $addhar = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $addhar);
            $user->aadhar = $addhar; 
            $user->aadhar_verify =1;

        }
       
        if($request->hasFile('pancard')){
            $file = $request->file('pancard');
            $pancard = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $pancard);
            $user->pancard = $pancard;
            $user->pancard_verify =1;

        }

        if($request->hasFile('election')){
            $file = $request->file('election');
            $election = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $election);
            $user->election_card = $election;
            $user->election_verify =1;

        }

        if($request->hasFile('electricity')){
            $file = $request->file('electricity');
            $electricity = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $electricity);
            $user->electricity = $electricity;
            $user->electricity_verify =1;
        }

        if($request->hasFile('certificate')){
            $file = $request->file('certificate');
            $certificate = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $certificate);
            $user->certificate = $certificate;
            $user->certificate_verify =1;
        }

        if($request->hasFile('passport')){
            $file = $request->file('passport');
            $passport = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $passport);

            $user->passport = $passport;
            $user->passport_verify =1;
        }

        if($request->hasFile('licence')){
            $file = $request->file('licence');
            $licence = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $licence);
            $user->driving_licence = $licence;
            $user->licence_verify =1;
        }

        $user->save();
        return response()->json(['status'=>200]);


    }

    public function edit($user_id){
        $user =  User::find($user_id);
        return view('user.edit_form',compact('user'));

    }

    public function update(Request $request){  
              
        $user =  User::find($request->user_id);

        if(isset($request->fname))
        $user->fname = $request->fname;

        if(isset($request->lname))
        $user->lname = $request->lname;

        if(isset($request->username))
        $user->username = $request->username;

        if(isset($request->email))
        $user->email = $request->email;

        if(isset($request->password))
        $user->password = Hash::make($request->password);

        if(isset($request->address))
        $user->address = $request->address;

        if(isset($request->pincode))
        $user->pincode = $request->pincode;

        if(isset($request->role_id))
        $user->role_id = $request->role_id;
        
        if(isset($request->pincode))
        $user->pincode = $request->pincode;
        
        if(isset($request->gender))
        $user->gender = $request->gender;
        
        if(isset($request->contact))
        $user->contact = $request->contact;
        
        if(isset($request->bank_name))
        $user->bank_name = $request->bank_name;
        
        if(isset($request->ifsc))
        $user->ifsc = $request->ifsc;
        
        if(isset($request->salary))
        $user->salary = $request->salary;
        
        if(isset($request->account_no))
        $user->account_no = $request->account_no;


        if($request->hasFile('aadhar')){
            $file = $request->file('aadhar');
            $addhar = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $addhar);
            $user->aadhar = $addhar; 
            $user->aadhar_verify = 1;

        }
       
        if($request->hasFile('pancard')){
            $file = $request->file('pancard');
            $pancard = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $pancard);
            $user->pancard = $pancard;
            $user->pancard_verify =1;

        }

        if($request->hasFile('election')){
            $file = $request->file('election');
            $election = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $election);
            $user->election_card = $election;
            $user->election_verify =1;

        }

        if($request->hasFile('electricity')){
            $file = $request->file('electricity');
            $electricity = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $electricity);
            $user->electricity = $electricity;
            $user->electricity_verify =1;
        }

        if($request->hasFile('certificate')){
            $file = $request->file('certificate');
            $certificate = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $certificate);
            $user->certificate = $certificate;
            $user->certificate_verify =1;
        }

        if($request->hasFile('passport')){
            $file = $request->file('passport');
            $passport = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $passport);

            $user->passport = $passport;
            $user->passport_verify =1;
        }

        if($request->hasFile('licence')){
            $file = $request->file('licence');
            $licence = $file->getClientOriginalName();
            $file->move('./public/uploads/users/'.$request->user_id.'/', $licence);
            $user->driving_licence = $licence;
            $user->licence_verify =1;
        }

        $user->update();
         return response()->json(['status'=>200]);
        //  return redirect()->back();
    }



    public function delete($id){

        $user = User::find($id);

        $user->is_deleted = 1;
        $user->update();
        
        return redirect()->route('users');

    }

        public function user_profile(){
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }

    public function get_leaves(){
        $casual =  Leaves::where('type',1)->where('user_id',Auth::user()->id)->count();
    
        $floating =  Leaves::where('type',3)->where('user_id',Auth::user()->id)->count();
        $medical =  Leaves::where('type',2)->where('user_id',Auth::user()->id)->count();
        // dd($casual);
        $user['casual'] = (12 - $casual);  // total 12 
        $user['floating'] = (2 - $floating); //total 2
        $user['medical'] = (5 - $medical); // total 5

        if(Auth::user()->role_id == 1){
            $user['adminNotificationLeaves'] = Leaves::where('to',Auth::user()->id)->where('hide',0)->get();
        }

        return  $user;
    }


    

}

