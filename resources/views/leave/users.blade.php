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
								<div class="alertrep-message">
									<h4 class="alert-heading">jQuery required</h4>
									<p>
										Unlike all other components included in this template, DataTables requires jQuery as a dependency. If you want to use
										DataTables in your application, add the following script element to your HTML code. The file includes both jQuery and
										DataTables.
									</p>
									<pre class="h6 text-danger mb-0">&#x3C;script src=&#x22;js/datatables.js&#x22;&#x3E;&#x3C;/script&#x3E;</pre>
								</div>
							</div>  -->
							<div class="card">

								<div class="card-header">
                                    <h3 class="card-title">Reports</h3>
                                    <a href="{{route('reports.addforms')}}" class="btn btn-primary" style="float:right;margin-top:-22px;">+ Add</a>
								</div>
								<div class="card-body classrelaced">
                                @if(!isset($report))
                                <div><h3>You haven't submitted any work report yet</h3></div>
                                @endif
                                @if(isset($report))
                                    <table id="datatables-column-search-text-inputs" class="table table-strippet" style="width:100%;">
                                    <thead>
                                    <tr>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Hour</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @php
                                        $count = 0;
                                        @endphp
                                        @foreach($report as $val)
                                            <tr>
                                            @if($count == 0)
                                            <td rowspan="{{count($report)}}">{{Auth::guard('admin')->user()->username}}</td>
                                            @endif
                                            @if($count == 0)
                                            <td rowspan="{{count($report)}}" width="10%">{{$val->date}}</td>
                                            @endif
                                            <td>{{$val->start_time}}</td>
                                            <td>{{$val->end_time}}</td>
                                            <td>{{$val->hours}}</td>
                                            <td>{{$val->description}}</td>
                                            <td><img src="{{asset('public/uploads/')}}/{{$val->image}}" class="class-image" height="100px"></td>
                                            </tr>
                                            @php
                                            @$count++;
                                            @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    @endif
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
			@endsection
@push('script')
<script>
$(".class-image").on('click',function(){
    var src = $(this).attr('src');
    window.open(src);
})
    </script>
    @endpush
