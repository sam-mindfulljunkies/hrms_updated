@extends('layouts.app')
@section('content')
<style>
.datepickers-init {
    width: 275px;
    float: left;
}
.alert .alert-error{
    background-color:#ff9090;
}
</style>
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title">Apply Leaves</h5>
                        <a href="{{route('leave.add_form')}}" class="btn btn-primary" style="float:right">Add new</a>
                    </div>

                    <div class="card-body classrelaced">
                        @if(Session::has('success'))
                        <div class="alert alert-success" style="padding: 12px;">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('error'))
                        <div class="alert alert-danger" style="padding: 12px;">{{Session::get('error')}}</div>
                        @endif

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
                                @foreach($leaves as $val1)
                                <tr>
                                    <td>{{$val1->id}}</td>
                                    <td>{{$val1->from_date}}</td>
                                    <td>{{$val1->to_date}}</td>
                                    <td>
                                        {{$val1->DayPart}} / {{$val1->subType}}
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
                                        <a href="javascript:;" data-id="{{$val1->id}}"
                                            class="btn btn-info btnCancle">Cancel</a>
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
$(".btnCancle").on('click', function() {
    var id = $(this).data('id');
    swal({
        title: "Are you sure?",
        text: "Cancle Leave request",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '{{url("/leave/cancle/")}}/' + id,
                method: 'GET',
                cache: false,
                processData: false,
                contentType: false,
                success: function(res) {
                    // location.reload();
                    if (res.status == 200) {
                        swal({
                            title: 'Successfully Cancle Leave',
                            text: 'Successfully changed status',
                            icon: 'success',
                        }).then(function() {
                            location.reload();
                        })

                    }

                }
            });
        } else {

        }
    })
});
</script>
@endpush