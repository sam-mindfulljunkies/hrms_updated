@php 
if(!isset($user)){
    $user = \App\Models\Reports::all();
}
@endphp

@foreach($user as $val)											<tr>
    <td>{{$val->id}}</td>
    <td>{{$val->date}}</td>
    <td>{{$val->time}}</td>
    <td>{{$val->description}}</td>
    <td>{{$val->image}}</td>
    <td><a href="{{route('users.details.report',$val->id)}}" class="view_click btn btn-success">View</a></td>
    </tr>
@endforeach