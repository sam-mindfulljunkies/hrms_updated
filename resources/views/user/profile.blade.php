@extends('layouts.app')
@section('content')
<style>
    .fas.fa-edit{
        font-size:25px;
    }
    </style>
<main class="content">
    <div class="container">
    <div class="card" style="padding:15px">
        <div class="row">
            <div class="col-md-5">
                <div class="demo" style="padding:10px;margin-left:0px;margin-top:30px;">
                    <img src="https://www.gstatic.com/webp/gallery/1.jpg" width="100px" height="100px" style="border-radius:50%"/>
                </div>         
            </div>
            <div class="col-md-3">
                <h2 style="left:10px;margin-left: -360px;margin-top: 75px;">
                <td>{{$user->fname}} {{$user->lname}}</td>
                <td>

                <a class="btn btn-xxs" title="Edit" href="{{route('edit_user',$user->id)}}">
                <i class="fas fa-edit"></i>

                    </a>
</td>
            </h2>
            </div>
        </div>
        <div class="col-md-12 mt-3">
        <table class="table table-bordered">
                            <tr>
                                <th>First Name</th>
                                <td>{{$user->fname}}</td>
                                <th>Last Name</th>
                                <td>{{$user->lname}}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{$user->username}}</td>
                                <th>Email</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Contact</th>
                                <td>{{$user->contact}}</td>
                                <th>Address</th>
                                <td>{{$user->address}}</td>
                            </tr>                            
                   </table>    
        </div>

    </div>
    </div>
</main>
@endsection