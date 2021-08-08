<x-front-layout>
		<!-- Breadcrumb -->
		<div class="breadcrumb-bar bg-primary">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-12">
						<nav aria-label="breadcrumb" class="page-breadcrumb px-5">
						</nav>
						<h2 class="breadcrumb-title text-white">Profile Settings</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
					<!-- Page Header -->
					<div class="container">
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title p-3">Profile</h3>
							</div>
						</div>
					</div>
				</div>
					<!-- /Page Header -->
					<div class="container">
					<div class="row"
						<div class="col-md-12">
							<div class="container">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										@if($profile->avatar)
										<img class="rounded-circle" alt="User Image" src="{{asset('assets/img/'. $profile->avatar)}}"  width="200" height="200">
										@else
										<img class="rounded-circle " alt="User Image" src="{{asset('assets/img/profile.jpg')}}"  width="200" height="200">
										@endif
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{Auth::user()->name}}</h4>
										<h6 class="text-muted"></h6>
										<div class="about-text"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

								<!-- Personal Details Tab -->
								
									<!-- Personal Details -->
									<div class="container p-5">
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													 <h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a href="{{route('profile.create')}}" class="btn btn-primary">
															Edit
														</a>
													</h5>
													<ul class="nav nav-tabs " id="myTab" role="tablist">
														<li class="nav-item" role="presentation">
														  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
														</li>
														<li class="nav-item" role="presentation">
														  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">More Information</button>
														</li>
													  </ul>
													  <div class="tab-content" id="myTabContent">
														<div class="tab-pane fade show active p-5" id="home" role="tabpanel" aria-labelledby="home-tab">
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">First Name</p>
																<p class="col-sm-10">{{$profile->first_name  }}</p>
															</div>
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Last Name</p>
																<p class="col-sm-10">{{$profile->last_name}}</p>
															</div>
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
																<p class="col-sm-10">{{$profile->birthday}}</p>
															</div>
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email</p>
																<p class="col-sm-10">{{$profile->user->email}}</p>
															</div>
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
																<p class="col-sm-10">{{$profile->mobile}}</p>
															</div>
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
																<p class="col-sm-10 mb-0"> {{$profile->address}}</p>
															</div>
														</div>

														<div class="tab-pane fade p-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0">Last Login Time: </p>
																<p class="col-sm-10 mb-0"> {{$profile->user->last_login_time}}</p>
															</div>
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0">Last Login IP: </p>
																<p class="col-sm-10 mb-0"> {{$profile->user->last_login_ip}}</p>
															</div>
															<div class="row">
																<p class="col-sm-2 text-muted text-sm-right mb-0">Ip Address: </p>
																<p class="col-sm-10 mb-0"> {{Request::ip()}}</p>
															</div>
														</div>
													</div>		
								</div>
							</div>
		</div>
	</div>
</div>
									
</x-front-layout>