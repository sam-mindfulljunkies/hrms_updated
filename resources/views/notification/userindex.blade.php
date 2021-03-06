@extends('layouts.app')
@section('content')

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
									<h5 class="card-title">Users</h5>
									<!-- <a href="{{route('notification.add_form')}}" class="btn btn-sm btn-primary" style="float:right">+Add</a> -->
									<!-- <h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table. See official -->
										<!-- documentation <a href="https://datatables.net/extensions/responsive/" target="_blank" -->
											<!-- rel="noopener noreferrer">here</a>.</h6> -->
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>subject</th>
												<th>Description</th>
												<th>Date</th>
												<th>Time</th>
												<th>Dismiss</th>
											</tr>
										</thead>
										<tbody>
											@foreach($notification as $val)
											<tr>
												<td>{{$val->subject}}</td>
												<td>{{$val->description}}</td>
												<td>{{date('Y-m-d',strtotime($val->created_at))}}</td>
												<td>{{date('H:i a',strtotime($val->created_at))}}</td>
												<td><a href="{{route('dismiss',['id'=>$val->id])}}" class="btn btn-danger">Dismiss</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			@endsection