<x-sg-usermaster>
<div class="mb-3 pt-2">
				<h4 class="mb-3 font-weight-semibold">
					My Appointemnt
				</h4>
				@if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

                @foreach($appoints as $appoint)
                
                <div class="card card-body" bis_skin_checked="1">
							<div class="media" bis_skin_checked="1">
								<div class="media-body" bis_skin_checked="1">
									<h5 class="media-title text-success font-weight-semibold mb-3">You have an medical test appointment!</h5>
									<p class="text-dark">You have an medical test appointment 
									<h6>Appoinmented as: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$appoint->patient_name}}</span></h6></span></h6>

                                    <h6>Test Name: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$appoint->test_name}}</span></h6></span></h6>

                                    
                                    <h6>Test Cost: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$appoint->cost}}</span></h6></span></h6>
                                    
                                    
									
									<h6>Appoinment Date: &nbsp;
									<span class="media-title text-success font-weight-semibold">{{date("l", strtotime($appoint->date))}}, &nbsp{{$appoint->date}} </span></h6>
									

									<form action="{{route('medical_appointment_cancel')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$appoint->id}}"> 
												<button type="submit" name="submit" class="btn btn-danger btn-sm mt-3" onclick="return confirm('Are you sure?')"><i class="icon-cross mr-1"></i>Cancel Appointemnt</button>
												<!-- <button type="submit" class="btn btn-danger btn-sm mt-3" id="sweet_warning">Cancel Appointemnt <i class="icon-cross ml-2"></i></button> -->
											</form>

								</div>

								<div class="ml-3 align-self-center" bis_skin_checked="1">
									<i class="icon-calendar3 icon-2x text-success-300"></i>
								</div>
							</div>
						</div>
                        @endforeach
			</div>
           
</x-sg-usermaster>    