@php
use \App\Http\Controllers\UserController;
$data = new UserController();
$user = $data->get_leaves();
@endphp
<style>
.margin-header p {
	margin-left:20%;
}
.margin-header{
	display:inherit;
}
</style>
<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middlfe" data-feather="search"></i>
						</button>
					</div>
				</form>
				@if(Auth::user()->role_id == 2)
				<div class="margin-header">
				<p>Leave Balance</p>
				<p>Casual  {{$user['casual']}}</p>
				<p>Floating {{$user['floating']}} </p>
				<p>Medical  {{$user['medical']}}</p>
				</div>
				@endif

				<div class="navbar-collapse collapse">
					 <ul class="navbar-nav navbar-align">
					
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>
						@if(Auth::user()->role_id == 1)
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
								<!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />  -->
								<span class="text-dark">{{Auth::user()->username}}</span>
							</a>
							@endif
							@if(Auth::user()->role_id == 2)
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
								<!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />  -->
								<span class="text-dark">{{Auth::user()->username}}</span>
							</a>
							@endif

							<div class="dropdown-menu dropdown-menu-right">
							@if(Auth::user()->role_id == 1)
							<a class="dropdown-item" href="{{route('admin.logout')}}">Log out</a>
							@endif
							@if(Auth::user()->role_id == 2)
							<a class="dropdown-item" href="{{route('admin.logout')}}">Log out</a>
							@endif
								
							</div>
						</li>
					</ul> 
				</div>
			</nav>