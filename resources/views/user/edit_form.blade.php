@extends('layouts.app')
@section('content')
	<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Add User</h1>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">User Registration</h5>
									<h6 class="card-subtitle text-muted">Bootstrap column layout.</h6>
								</div>
								<div class="card-body">
									<form method="post" action="{{route('update_user')}}" id="user_register">
                                    <div class="row">
											<div class="mb-3 col-md-4">
												<label class="form-label" for="inputEmail4">Fname</label>
												<input type="text" name="fname" class="form-control" id="fname" placeholder="Fitst Name" value="{{$user->fname}}">
											</div>
											<div class="mb-3 col-md-4">
												<label class="form-label" for="inputPassword4">Lname</label>
												<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="{{$user->lname}}">
                                            </div>
                                            
											<div class="mb-3 col-md-4">
												<label class="form-label" for="inputPassword4">Username</label>
												<input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{$user->username}}">
                                            </div>
                                        </div>
                                        <div class="row">
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputAddress">Email</label>
											<input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputAddress2">Password</label>
											<input type="password" class="form-control" name="password" placeholder="password"value="{{old($user->password)}}">
                                        </div>
                                        
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputAddress2">Address</label>
											<input type="text" class="form-control" name="address" placeholder="Apartment, studio, or floor" value="{{$user->address}}">
                                        </div>
                                        </div>

										<div class="row">
											<div class="mb-3 col-md-4">
												<label class="form-label" for="inputCity">Gender</label>
												<select class="form-control" name="gender">
                                                    <option value="male" {{($user->gender == 'male') ? "selected":""}}>Male</option>
                                                    <option value="female" {{($user->gender == 'female') ? "selected":""}}>Female</option>
                                                </select>
											</div>
											<div class="mb-3 col-md-4">
                                                <label class="form-label" for="inputState">pincode</label>
                                                <input type="text" class="form-control" name="pincode" value="{{$user->pincode}}">
											</div>
											<div class="mb-3 col-md-2">
												<label class="form-label" for="inputZip">Contact</label>
												<input type="text" class="form-control" id="contact" name="contact" value="{{$user->contact}}">
                                            </div>
                                            <div class="mb-3 col-md-2">
												<label class="form-label" for="inputZip">Bank Name</label>
												<input type="text" class="form-control" name="bank_name" value="{{$user->bank_name}}">
                                            </div>
                                            <div class="mb-3 col-md-4">
												<label class="form-label" for="inputZip">Account Number</label>
												<input type="text" class="form-control"  name="account_no" value="{{$user->account_no}}">
                                            </div>
                                            
                                            <div class="mb-3 col-md-4">
												<label class="form-label" for="inputZip">IFSC</label>
												<input type="text" class="form-control" name="ifsc" value="{{$user->ifsc}}">
                                            </div>
                                            
                                            <div class="mb-3 col-md-4">
												<label class="form-label" for="inputZip">Salary</label>
												<input type="text" class="form-control" id="salary" name="salary" value="{{$user->salary}}">
											</div>
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
            username: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength:5,
            },
            salary:{
                digits:true,
            },
            conatct:{
                digits:true,
                minlength:10,
                maxlength:10,
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
                contentType:false,
          		success:function(response){
            Swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Successfully Updated`',
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