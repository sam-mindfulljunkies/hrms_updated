@if(isset($user))
<table>
    <tr>
        <th>User</th>
        <th>Time Slot</th>
        <th>Date</th>
        <th>Description</th>
        <th>Image</th>
    </tr>
    @foreach($user as $val)
    <tr>
        <td rowspan="{{count($val->reports)}}">{{$user}}</td>
    @foreach($val->reports as $val1)
        <td>{{$val1->time}}</td>
        <td>{{$val1->date}}</td>
        <td>{{$val1->description}}</td>
        <td>{{$val1->image}}</td>
    @endforeach
    </tr>
    @endforeach
</table>
@endif