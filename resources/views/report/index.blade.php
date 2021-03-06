@extends('layouts.app')
@section('content')
<style>
.datepickers-init{
	width:275px;
	float:left;
}</style>
			<main class="content">
				<div class="container-fluid p-0">

					<!-- <div class="mb-3">
						<h1 class="h3 d-inline align-middle">Responsive DataTables</h1><a class="badge bg-success text-white ml-2"
							href="https://adminkit.io/pricing/" target="_blank">Pro Component <i class="fas fa-fw fa-external-link-alt"></i></a>
					</div> -->

					<div class="row">
						<div class="col-12">
							<!-- <div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
								<div class="alert-message">
									<h4 class="alert-heading">jQuery required</h4>
									<p>
										Unlike all other components included in this template, DataTables requires jQuery as a dependency. If you want to use
										DataTables in your application, add the following script element to your HTML code. The file includes both jQuery and
										DataTables.
									</p>
									<pre class="h6 text-danger mb-0">&#x3C;script src=&#x22;js/datatables.js&#x22;&#x3E;&#x3C;/script&#x3E;</pre>
								</div>
							</div> -->
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Reports</h5>
								
								<label style="float:left;margin-top:4px;"><b>Select Date : &nbsp;&nbsp;</b></label>
								<input type="date" class="datepickers-init form-control" id="datepick">
								</div>
								<div class="card-body classrelaced">
									@include('report.renderuserdiv')
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			@endsection

			@push('script')
			<script>
			$("#datepick").on('change',function(){
				var date = $(this).val();
				var url = '/reports/users/'+date;
				$.ajax({
					url:url,
					method:"POST",
					data: {
        				"_token": "{{ csrf_token() }}",
					},
					success:function(e){
						$(".classrelaced").html(e);
					}
				})
			})
			</script>
			@endpush
