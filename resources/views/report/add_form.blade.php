@extends('layouts.app')
@section('content')
	<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Add Report</h1>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<form method="post" action="{{route('submit_report')}}" id="report_register" enctype="multipart/form-data">
                                    <div class="row">
											<div class="mb-3 col-md-4">
                                                <label class="form-label" for="inputEmail4">Date</label>
												<input type="text" name="date" class="form-control" id="date" value="{{date('Y-m-d')}}"  disabled>
                                            </div>
                                            <div class="mb-3 col-md-4">
												<label class="form-label" for="inputEmail4">Time</label>
												<input type="text" name="time" class="form-control" id="time" value="{{date('H:i:s')}}"  disabled>
                                            </div>
                                            <div class="mb-3 col-md-4">
											<label class="form-label" for="inputAddress2">File</label>
											<input type="file" class="form-control" name="image" id="file" onchange="fileValidation()"/>
                                        </div>
                                        <div class="row">
											<div class="mb-3 col-md-3">
                                                <label class="form-label" for="inputEmail4">Start Time</label>
												<input type="time" name="start_time" class="form-control" id="start_time">
                                            </div>
                                            <div class="mb-3 col-md-3">
												<label class="form-label" for="inputEmail4">End Time</label>
												<input type="time" name="end_time" class="form-control" id="end_time">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label" for="inputAddress2">Project</label>
                                                <input type="text" class="form-control" name="project"/>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label" for="inputAddress2">Hours</label>
                                                <input type="text" class="form-control" name="hours"/>
                                            </div>
                                        </div>
											<div class="mb-3 col-md-12">
												<label class="form-label" for="inputPassword4">Description</label>
												<textarea class="form-control" name="description" style="resize:none;height:100px"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="role_id" value="2">
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

// $(document).ready(function(){
//     $(".btnsub").on('click',function(){
//         $(this).submit();
//     });
// });

$(document).ready(function () {
    var url = "{{route('submit_report')}}";
    $('#report_register').validate({ 
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
                processData:false,
                cache:false,
                contentType:false,
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
