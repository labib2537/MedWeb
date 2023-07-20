<x-sg-usermaster>
    <!-- Card deck -->
    <div class="mb-3 pt-2">
								<h6 class="mb-0 font-weight-semibold">
									All Medical Test Lists
								</h6>
								
							</div>
							@if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

                            <!-- Search field -->
				<div class="card">
					<div class="card-body">
						<h5 class="mb-1">Medical test search results</h5>

						<form action="{{route('medicalTest_search_user')}}" method="get">
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

							<!-- Ex -->

						<div class="row">



@foreach($tests as $med_test) 

   <div class="col-xl-3 col-md-6">


 <div class="card">
		   <div class="card-img-actions mx-1 mt-1">
		   <img class="card-img img-fluid" src="{{asset('uploads/images/medical_tests/'.$med_test->image)}}" style="height: 300px;">
		  </div>

	<div class="card-body text-center">
			<h5 class="font-weight-semibold">{{$med_test->name}}</h5>
			<h6 class=" text-primary">Cost: {{$med_test->cost}}</h6>
			<p class="text-muted">Attendence Time: {{$med_test->time}}</p>
			<p class="text-muted">Place: {{$med_test->place}}</p>
			<form action="{{route('medicalTest_add_user')}}" method="get"> 
                @csrf
				<input type="hidden" name="id" value="{{$med_test->id}}">
				<button class="btn bg-primary-400 legitRipple"><i class="icon-calendar2 mr-2"></i>Make Appointment</a></button>
			</form>
	</div>

</div>

</div>

@endforeach
</div>

<!--Ex-->
</x-sg-usermaster>        