@extends('layouts.app')
@section('content')
	<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Apply Leave</h1>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<form method="post" action="{{route('submit_leave')}}" id="report_register" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
											<div class="mb-3 col-md-4">
                                                <label class="form-label" for="inputEmail4">From Date</label>
												<input type="date" name="from_date" class="form-control" id="from_date">
                                            </div>
                                            <div class="mb-3 col-md-4">
												<label class="form-label" for="inputEmail4">To Date</label>
												<input type="date" name="to_date" class="form-control" id="to_date">
                                            </div>
                                        <div class="row">
											<div class="mb-3 col-md-3">
                                                <label class="form-label" for="inputEmail4">Type</label>
												<select name="type" class="form-control" id="half_type">
                                                    <option value="1">Half day</option>
                                                    <option value="2">Full Day</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Select Halfday Type</label>
                                                <select class="form-control" id="half_id" name="is_first_half">
                                                    <option value="1">First Half</option>
                                                    <option value="2">Second Half</option>
                                                </select>
                                            </div>
                                        </div>
											<div class="mb-3 col-md-12">
												<label class="form-label" for="inputPassword4">Description</label>
												<textarea class="form-control" name="description" style="resize:none;height:100px"></textarea>
                                            </div>
                                        </div>
										<button type="submit" class="btn btn-primary btnsub">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
                    <div id="imagePreview"></div> 
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

$(document).ready(function(){
    $("#half_id").prop('disabled',false);
    $("#half_type").on('change',function(){
        var half = $(this).val();
        debugger;
        if(half == 1){
            $("#half_id").prop('disabled',false);
        }else{
            $("#half_id").prop('disabled',true);
        }
    });
});

$(document).ready(function () {
    var url = "{{route('submit_leave')}}";
    $('#leave_register').validate({ 
        rules: {
            description: {
                required: true
            },
            image:{
                required:true
            },
            hours:{
                required:true,
                digits:true,
                minlength:1,
            },
            start_time:{
                required:true
            },
            end_time:{
                required:true
            },
            project:{
                required:true
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
          	 var formdata =  new FormData($("#report_register")[0]);
             $.ajax({
          		url:url,
          		type: 'POST',
          		data:formdata,
          		success:function(response){
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Successfully Registered',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    $("report_register")[0].reset();
          		}
          	})
          }
    });
});

function fileValidation() { 
            var fileInput =  
                document.getElementById('file'); 
              
            var filePath = fileInput.value; 
          
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                $("<span class='fileuploaderror' style='color:red;'>Please select valid Image</span>").insertAfter('#file');
                fileInput.value = ''; 
                return false; 
            }  
            else  
            { 
                $(".fileuploaderror").html('');
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        } 
</script>
@endpush
