<x-sg-usermaster>
<div class="mb-3 pt-2">
				<h4 class="mb-3 font-weight-semibold">
					My Test Report
				</h4>
				@if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

                @foreach($reports as $appoint)
                
                <div class="card card-body" bis_skin_checked="1">
							<div class="media" bis_skin_checked="1">
								<div class="media-body" bis_skin_checked="1">
									<h5 class="media-title text-success font-weight-semibold mb-3">Test Report of {{$appoint->test_name}}</h5>
								
									<h6>Patient Name: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$appoint->patient_name}}</span></h6></span></h6>

                                    <h6>Test Name: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$appoint->test_name}}</span></h6></span></h6>

                                    
                                    <h6>Test Type: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$appoint->cost}}</span></h6></span></h6>
                                    
                                    
									
									<h6>Test Date: &nbsp;
									<span class="media-title text-success font-weight-semibold">{{date("l", strtotime($appoint->date))}}, &nbsp{{$appoint->date}} </span></h6>
									@if($appoint->report_file==null)
									<h6>Test Report: &nbsp;
									<span class="media-title text-success font-weight-semibold">Your test report isn't ready yet!</span></h6>
									@else
									<h6>Test Report: &nbsp;
									<span class="media-title text-success font-weight-semibold">{{$appoint->report_file}}</span></h6>

									<form action="{{route('report_show_user')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$appoint->id}}"> 
												<button type="submit" name="submit" class="btn btn-success btn-sm mt-3">View Report</button>
											</form>
									@endif		

								</div>

								<div class="ml-3 align-self-center" bis_skin_checked="1">
									<i class="icon-files-empty icon-2x text-success-300"></i>
								</div>
							</div>
						</div>
                        @endforeach
			</div>
           
</x-sg-usermaster>    