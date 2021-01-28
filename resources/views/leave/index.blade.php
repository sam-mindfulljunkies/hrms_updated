@extends('layouts.app')
@section('content')
<style>
.datepickers-init{
	width:275px;
	float:left;
}</style>
			<main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Leaves</h5>
									<a href="{{route('leave.add_form')}}" class="btn btn-primary" style="float:right">Add new</a>
								</div>

								<div class="card-body classrelaced">
								<table id="datatables-reponsive" class="table table-strippet" style="width:100%;">
<thead>    
<tr>
        <th>#</th>
        <th>FromDate</th>
        <th>ToDate</th>
        <th>Half/fullday</th>
        <th>Description</th>
        <th>Status</th>
        <th>Cancel</th>
    </tr>
</thead>
    <tbody>
    @foreach(\App\Models\Leaves::all() as $val1)
        <tr>
        <td>{{$val1->id}}</td>
        <td>{{$val1->from_date}}</td>
        <td>{{$val1->to_date}}</td>
        <td>
            @if($val1->is_first_half == 1)
            first_half
            @elseif($val1->is_first_half == 2)
            second_half
            @else
            Full day
            @endif
        </td>
        <td>{{$val1->description}}</td>
        <td>
        	@if($val1->status == 1)
            approved
            @elseif($val1->status == 2)
            reject
            @elseif($val1->status == 3)
            taken
            @else
            pending
            @endif
        </td>
		<td>
            @if($val1->status > 2 || $val1->status == 0)
			<a href class="btn btn-info">Cancel</a>
            @else
			-
			@endif
        </td>
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

			@push('script')
			<script>
			</script>
			@endpush
