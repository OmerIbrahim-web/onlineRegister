<!-- Sidebar-right-->
		<div class="sidebar sidebar-left sidebar-animate">
			<div class="panel panel-primary card mb-0 box-shadow">
				<div class="tab-menu-heading border-0 p-3">
					<div class="card-title mb-0">الإعدادت</div>
					<div class="card-options mr-auto">
						<a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
					</div>
				</div>
				<div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">
							<li class=""><a href="#side1" class="active" data-toggle="tab"><i class="ion ion-md-cog tx-18 ml-2"></i> إعدادات الحساب</a></li>
							<li><a href="#side2" data-toggle="tab"><i class="ion ion-md-person tx-18  ml-2"></i> إعدادات المظهر</a></li>
							<li><a href="#side3" data-toggle="tab"><i class="ion ion-md-lock tx-18 ml-2"></i> تغيير كلمة المرور</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane active " id="side1">

							<div class="list d-flex align-items-center p-3">
								<div class="">
									<span class="avatar bg-blue brround avatar-md">A</span>
								</div>
								<a class="wrapper w-100 mr-3" href="#" >
									<p class="mb-0 d-flex ">
										<b>{{Auth::user()->email}}</b>
									</p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="d-flex align-items-center">
											{{-- <i class="mdi mdi-clock text-muted ml-1"></i> --}}
											{{-- <small class="text-muted ml-auto">2 days ago</small> --}}
											<p class="mb-0"></p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="tab-pane  " id="side2">
							<div class="list-group list-group-flush ">	
								<div class="list-group-item d-flex  align-items-center">
									<div class="ml-3">
										<span class="avatar avatar-lg brround cover-image" data-image-src="{{URL::asset('assets/img/media/settings/dark-light.png')}}"><span class="avatar-status bg-success"></span></span>
									</div>
									<div class="col-md-6">
										<strong>الوضع الليلي</strong> 
										
										<div class="small text-muted">
											12 mintues ago
										</div>
									</div>
									@if (Session()->has('dark_mode'))
									<a href="{{ route('settings.dark_mode_off') }}">
										<div class="main-toggle main-toggle-dark on float-left">
										<span></span>
										</div>
									</a>
									@else
									<a href="{{ route('settings.dark_mode_on') }}">
										<div class="main-toggle main-toggle-dark float-left">
										<span></span>
										</div>
									</a>
									@endif
								</div>
							</div>
						</div>
						<div class="tab-pane  " id="side3">
							<div class="list-group list-group-flush ">
								<div class="list-group-item d-flex  align-items-center">
									<div class="ml-2">
										<span class="avatar avatar-md brround cover-image" data-image-src="{{URL::asset('assets/img/faces/4.jpg')}}"></span>
									</div>
									<div class="">
										<div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">{{ auth()->user()->name }}</div>
									</div>
									<div class="mr-auto">
										<a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel{{ Auth::user()->id }}" ><i class="fa fa-key"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--/Sidebar-right-->
