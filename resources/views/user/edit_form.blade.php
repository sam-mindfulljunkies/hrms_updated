@extends('layouts.app')
@section('content')

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Update Profile</h1>
                    @if(explode('/',URL::previous())[3] != 'myprofile')
                    <a class="btn btn-primary mt-4" href="{{ URL::previous() }}" style="right:4%;position:absolute;z-index:9">Go back</a> 
                    @else
                    <a class="btn btn-primary mt-4" href="{{ URL::previous() }}" style="right:4%;position:absolute;z-index:9">Go back</a> 
                    @endif
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Update User Details</h5>
									<!-- <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6> -->
								</div>
								<div class="card-body">
									<form method="post" action="{{route('update_user')}}" id="user_register" enctype="multipart/form-data">
                                    <div class="row">
											<div class="mb-3 col-md-4 form-group">
												<label class="form-label" for="inputEmail4">Fname</label>
												<input type="text" name="fname" class="form-control" id="fname" placeholder="Fitst Name" value="{{$user->fname}}">
											</div>
											<div class="mb-3 col-md-4 form-group">
												<label class="form-label" for="inputPassword4">Lname</label>
												<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="{{$user->lname}}">
                                            </div>
                                            
											<div class="mb-3 col-md-4 form-group">
												<label class="form-label" for="inputPassword4">Username</label>
												<input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{$user->username}}">
                                            </div>
                                        </div>
                                        <div class="row">
										<div class="mb-3 col-md-4 form-group">
											<label class="form-label" for="inputAddress">Email</label>
											<input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
										</div>
										<div class="mb-3 col-md-4 form-group">
											<label class="form-label" for="inputAddress2">Address</label>
											<input type="text" class="form-control" name="address" placeholder="Apartment, studio, or floor" value="{{$user->address}}">
                                        </div>
                                        </div>

										<div class="row">
											<div class="mb-3 col-md-4 form-group">
												<label class="form-label" for="inputCity">Gender</label>
												<select class="form-control" name="gender">
                                                    <option value="male" {{($user->gender == 'male') ? "selected":""}}>Male</option>
                                                    <option value="female" {{($user->gender == 'female') ? "selected":""}}>Female</option>
                                                </select>
											</div>
											<div class="mb-3 col-md-4 form-group">
                                                <label class="form-label" for="inputState">pincode</label>
                                                <input type="text" class="form-control" name="pincode" value="{{$user->pincode}}">
											</div>
											<div class="mb-3 col-md-2 form-group">
												<label class="form-label" for="inputZip">Contact</label>
												<input type="text" class="form-control" id="contact" name="contact" value="{{$user->contact}}">
                                            </div>
                                            <div class="mb-3 col-md-2 form-group">
												<label class="form-label" for="inputZip">Bank Name</label>
												<input type="text" class="form-control" name="bank_name" value="{{$user->bank_name}}">
                                            </div>
                                            <div class="mb-3 col-md-4 form-group">
												<label class="form-label" for="inputZip">Account Number</label>
												<input type="text" class="form-control"  name="account_no" value="{{$user->account_no}}">
                                            </div>
                                            
                                            <div class="mb-3 col-md-4 form-group">
												<label class="form-label" for="inputZip">IFSC</label>
												<input type="text" class="form-control" name="ifsc" value="{{$user->ifsc}}">
                                            </div>

                                              
                                            
                                            <div class="mb-3 col-md-4 form-group">
												<label class="form-label" for="inputZip">Salary</label>
												<input type="text" class="form-control" id="salary" name="salary" value="{{$user->salary}}">
											</div>
                                            @if(explode('/',URL::previous())[3] == 'myprofile')

                                            @if($user->pancard_verify != 1)
                                                <div class="mb-3 col-md-4 form-group">
                                    <label class="form-label" for="inputZip">Pancard</label>
                                    <input type="file" name="pancard" id="pancard" class="form-control">
                                </div>
                                @endif
                                
                                @if($user->electricity_verify != 1)
                                <div class="mb-3 col-md-4 form-group">
                                    <label class="form-label" for="inputZip">Electricity</label>
                                    <input type="file" name="electricity" id="electricity" class="form-control">
                                </div>
                                @endif
                                @if($user->certificate_verify != 1)
                                <div class="mb-3 col-md-4 form-group">
                                    <label class="form-label" for="inputZip">Certificate</label>
                                    <input type="file" name="certificate" id="certificate" class="form-control">
                                </div>
                                @endif
                                @if($user->election_verify != 1)
                                <div class="mb-3 col-md-4 form-group">
                                    <label class="form-label" for="inputZip">Election</label>
                                    <input type="file" name="election" class="form-control">
                                </div>
                                @endif
                                @if($user->licence_verify != 1)
                                <div class="mb-3 col-md-4 form-group">
                                    <label class="form-label" for="inputZip">Licence</label>
                                    <input type="file" name="licence" class="form-control">
                                </div>
                                @endif
                                @if($user->passport_verify != 1)
                                <div class="mb-3 col-md-4 form-group">
                                    <label class="form-label" for="inputZip">Passport</label>
                                    <input type="file" name="passport" class="form-control">
                                </div>
                                @endif
                                                @endif
                                        </div>
                                        <input type="hidden" name="role_id" value="2">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
										<button type="submit" class="btn btn-primary btnsub">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
            </main>
        
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// $(document).ready(function(){
//     $(".btnsub").on('click',function(){
//         $(this).submit();
//     });
// });

$(document).ready(function () {
    var url = "{{route('update_user')}}";
    $('#user_register').validate({ 
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true,
            },
            contact: {
                required:true,
                digits: true,
                maxlength: 10
            },
            username: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            salary: {
                digits: true,
            },
         
            account_no: {
                digits: true
            },
            certificate:{
                required: true,
                extension: "png|jpg|pdf"
            },
            pancard:{
                required: true,
                extension: "png|jpg|pdf"
            },
            electricity:{
                required: true,
                extension: "png|jpg|pdf"
            },
            pincode:{
                maxlength:6
            }
        },
        messages: {
            fname: {
                required: "Firstname should be required"
            },
            lname: {
                required: "Lastname should be required",
            },
            contact: {
                required:"Contact should be required",
                digits: "Only Numbers allowed",
                maxlength:"10 Digits are allowd only"
            },
            username: {
                required: "Username should be required",
            },
            email: {
                required: "Email should be required",
                email: "Valid Email should be required",
            },

            salary: {
                digits: "Only Numbers should be required",
            },
            account_no: {
                digits: "Only Number should be required"
            },
            pincode:{
                maxlength:"Max Length for  pincode will be 6 digits",
            }
        },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          },
          submitHandler: function(){
          	 var formdata =  new FormData($("#user_register")[0]);
             $.ajax({
          		url:url,
          		type: 'POST',
          		data:formdata,
                processData:false,
                cache:false,
                async:false,
                contentType:false,
          		success:function(response){
            swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Successfully Updated',
                    showConfirmButton: false,
                    timer: 2000
                    })
          		}
          	})
          }
    });
});
</script>
@endpush