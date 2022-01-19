@extends('layouts.app')
@section('content')
	<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Add Notification</h1>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">User Registration</h5>
									<h6 class="card-subtitle text-muted">Bootstrap column layout.</h6>
								</div>
								<div class="card-body">
									<form method="post" action="javascript:;" id="notification_register">
                                    <div class="row">
											<div class="col-md-12">
												<label class="form-label" for="inputEmail4">To Users : </label>
												<select class="js-example-basic-multiple form-control" name="to[]" multiple="multiple" id="users">
                                                    <option value="">select</option>
                                                    @foreach(\App\Models\User::where('role_id',2)->get() as $val)
                                                    <option value="{{$val->id}}">{{$val->username}}</option>
                                                    @endforeach
                                                </select>
											</div>
                                            <!-- <div class="row" style="margin-top:3px;"> -->
											<div class="mb-3 col-md-12" style="margin-top:10px;">
												<label class="form-label" for="inputPassword4">Subject</label>
												<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                            <!-- </div> -->
                                            <!-- <div class="row"> -->
											<div class="mb-3 col-md-12">
												<label class="form-label" for="inputPassword4">Description : </label>
												<textarea name="description" class="form-control" id="description" placeholder="Description" style="resize:none;"></textarea>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                        <input type="hidden" name="role_id" value="2">
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
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
    var url = "{{route('submit_notification')}}";
    $('#notification_register').validate({ 
        rules: {
            subject: {
                required: true
            },
            description: {
                required: true,
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
          	 var formdata =  new FormData($("#notification_register")[0]);
             $.ajax({
          		url:url,
          		type: 'POST',
                method:"POST",
          		data:formdata,
                processData:false,
                cache:false,
                contentType:false,
          		success:function(response){
            Swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Successfully Registered',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    $("#notification_register")[0].reset();
                    $("#users").select2("val", "");
          		}
          	})
          }
    });
});
</script>
<script>
            $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endpush