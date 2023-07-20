<x-sg-master>
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
						<h6 class="mb-1">Medical test search results</h6>

						<form action="{{route('medical_test_search')}}" method="get">
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

							@foreach($tests as $key=>$med_test)

                                   <div class="col-xl-3 col-md-6">
							

	                             <div class="card">
		                                   <div class="card-img-actions mx-1 mt-1">
			                               <img class="card-img img-fluid" src="{{asset('uploads/images/medical_tests/'.$med_test->image)}}" style="height: 300px;" alt="">
		                                  </div>

		                            <div class="card-body text-center">
			                                <h5 class="font-weight-semibold">{{$med_test->name}}</h5>
			                                <h6 class=" text-primary">Cost: {{$med_test->cost}}</h6>
											<p class="text-muted">Attendence Time: {{$med_test->time}}</p>
											<p class="text-muted">Place: {{$med_test->place}}</p>
			                                
									<ul class="list-inline list-inline-condensed mt-3 mb-0">
									
									<li class="list-inline-item">
										<form action="{{route('medical_test_edit')}}" method="post">
                                             @csrf
												<input type="hidden" name="id" value="{{$med_test->id}}">
												<button class="btn btn-outline bg-info-800 btn-icon text-info-800 border-info-800 border-2 rounded-round legitRipple"
												 type="submit"><i class="icon-pencil"></i></button>
						                        </form>
									</li>
	
								
									<li class="list-inline-item">
									<form action="{{route('medical_test_delete')}}" method="post">
                                        @csrf
												<input type="hidden" name="id" value="{{$med_test->id}}">
												<button class="btn btn-outline bg-danger-800 btn-icon text-danger-800 border-danger-800 border-2 rounded-round legitRipple"
												 type="submit" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i></button>
						                        </form>
									</li>

								</ul>

		                            </div>
		
	                            </div>
	                        

                             </div>
							 
							 @endforeach
                        </div>

                         <!--Ex-->

</x-sg-master>