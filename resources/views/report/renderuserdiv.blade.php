@if(isset($user))
<table id="datatables-reponsive" class="table table-strippet table-bordered" style="width:100%;">
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
        @if($count == 0)
        <td rowspan="{{count($val->reports)}}" width="10%">{{$val1->date}}</td>
        @endif
        <td>{{$val1->start_time}}</td>
        <td>{{$val1->end_time}}</td>
        <td>{{$val1->hours}}</td>
        <td>{{$val1->description}}</td>
        <td><img src="{{asset('public/uploads/')}}/{{$val1->image}}" style="height:100px"></td>
        </tr>
        @php
        @$count++;
        @endphp
    @endforeach
    </tr>
    @endforeach
</tbody>
</table>
@endif