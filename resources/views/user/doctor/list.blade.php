<x-sg-usermaster>
    	<!-- Horizontal cards -->
			<div class="mb-3 pt-2">
				<h6 class="mb-0 font-weight-semibold">
					Doctors
				</h6>
				
			</div>
            @if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

					@if(Session::has('error'))
                    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('error')}}</div>
                    @endif  

                    <!-- Search field -->
				<div class="card">
					<div class="card-body">
						<h5 class="mb-1">Doctor search results</h5>

						<form action="{{route('doctor_search_user')}}" method="get">
                            @csrf
							<div class="input-group mb-1">
								<div class="form-group-feedback form-group-feedback-left">
									<input type="search" name="search" class="form-control form-control-lg" placeholder="Search">
									<div class="form-control-feedback form-control-feedback-lg">
										<i class="icon-search4 text-muted"></i>
									</div>
								</div>

								<div class="input-group-append">
									<button type="submit" class="btn btn-primary">Search</button>
								</div>
							</div>

							
						</form>
					</div>
				</div>
				<!-- /search field --> 

			<div class="row">
			
			   @foreach($doctors as $key=>$doctor)



				<div class="col-xl-3 col-md-6">
					<div class="card card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#">
									<img src="{{asset('uploads/images/doctors/'.$doctor->image)}}" class="rounded-circle" width="42" height="42" alt="">
								</a>
							</div>

							<div class="media-body">
								<h6 class="mb-0">{{$doctor->name}}</h6>
								<span class="text-muted">{{$doctor->specialist}}</span>
							</div>

							<div class="ml-3 align-self-center">
								<div class="list-icons">
									<div class="dropdown">
										<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<form action="{{route('appointment_add_user')}}" method="get">
												<input type="hidden" name="id" value="{{$doctor->id}}">
												<button type="submit"name="submit" class="dropdown-item"><i class="icon-calendar3"></i> Make an Appoinment</button>
											</form>
											<form action="{{route('doctor_show_user')}}" method="post">
                                                @csrf
												<input type="hidden" name="id" value="{{$doctor->id}}">
												<button type="submit"name="submit" class="dropdown-item"><i class="icon-eye"></i> View Details</button>
											</form>
											
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				@endforeach
			</div>

		
			<!-- /horizontal cards -->

</x-sg-usermaster>    