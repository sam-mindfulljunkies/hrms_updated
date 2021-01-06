@if(isset($user))
<table class="table table-strippet table-bordered">
    <tr>
        <th>User</th>
        <th>Time Slot</th>
        <th>Date</th>
        <th>Description</th>
        <th>Image</th>
    </tr>
    @foreach($user as $val)
        <tr>
        @php
        $count = 0;
        @endphp 
    @foreach($val->reports as $val1)
        <tr>
        @if($count == 0)
        <td rowspan="{{count($val->reports)}}">{{$val->username}}</td>
        @endif
        <td>{{$val1->time}}</td>
        <td>{{$val1->date}}</td>
        <td>{{$val1->description}}</td>
        <td>{{$val1->image}}</td>
        </tr>
        @php
        @$count++;
        @endphp
    @endforeach
    </tr>
    @endforeach
</table>
@endif