@extends('layouts.app')
@section('content')
<style>
.mt-3 {
    margin-top: 3%;
}
</style>
<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Analytics</strong> Dashboard</h3>
            </div>
            <!---Notification-->
            <!-- <div class="col-auto ml-auto text-right mt-n1"> -->
            @if(Auth::user()->role_id != 1)
            @if(Auth::user()->pancard_verify !=1)
            <div class="alert alert-danger p-3 mt-3">Please update Pancard documentation as your profile detail was
                incomplete<a style="right: 2% !important;position: absolute;margin-top: 0.1%;" href=""><i
                        class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            @endif
            @if(Auth::user()->aadhar_verify !=1)
            <div class="alert alert-danger p-3 mt-3">Please update Aadhar as your profile detail was incomplete <a
                    style="right: 2% !important;position: absolute;margin-top: 0.1%;" href=""><i class="fa fa-times"
                        aria-hidden="true"></i></a>
            </div>
            @endif
            @if(Auth::user()->certificate_verify !=1)
            <div class="alert alert-danger p-3 mt-3">Please update Certification as your profile detail was incomplete<a
                    style="right: 2% !important;position: absolute;margin-top: 0.1%;" href=""><i class="fa fa-times"
                        aria-hidden="true"></i></a>
            </div>
            @endif

			@if(Auth::user()->certificate_verify !=1 || 
			Auth::user()->certificate_verify !=1 ||
			 Auth::user()->pancard_verify !=1))

            <div class="alert alert-primary p-3">To Update the Documentation Please goto My profile section from
                sidebar<a style="right: 2% !important;position: absolute;margin-top: 0.1%;" href=""><i
                        class="fa fa-times" aria-hidden="true"></i></a>
            </div>
			@endif
			@endif

            <!-- </div> -->
            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">AdminKit</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Sales</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-primary-light">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">2.382</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Sales</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-primary-light">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">2.382</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Sales</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-primary-light">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">2.382</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Sales</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-primary-light">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">2.382</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div> -->
        </div>
        <!-- 
					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td><i class="fas fa-circle text-primary fa-fw"></i> Chrome</td>
													<td class="text-right">4306</td>
												</tr>
												<tr>
													<td><i class="fas fa-circle text-warning fa-fw"></i> Firefox</td>
													<td class="text-right">3801</td>
												</tr>
												<tr>
													<td><i class="fas fa-circle text-danger fa-fw"></i> IE</td>
													<td class="text-right">1689</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Assignee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div> -->

    </div>
</main>
@endsection