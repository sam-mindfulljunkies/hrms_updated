@if(isset($user))
<table id="datatables-reponsive" class="table table-strippet table-bordered" style="width:100%;">
<thead>    
<tr>
        <th>User</th>
        <th>Date</th>
        <th>Time Slot</th>
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
        <td>{{$val1->time}}</td>
        <td>{{$val1->description}}</td>
        <td>{{$val1->image}}</td>
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